<x-app-layout>
    <x-slot name="header">
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Dashboard') }}
      </h2>
    </x-slot>
  
    <div class="container p-4 mx-auto">
      <div class="overflow-x-auto">

        @if (session('success'))
          <div class="p-4 mb-4 text-green-600 bg-green-200">
            {{ session('success') }}
          </div>
        @elseif (session('error'))
          <div class="p-4 mb-4 text-red-600 bg-red-200">
            {{ session('error') }}
          </div>
        @endif
          
        <a href="{{ route('mahasiswa-create')}}">
            <button class="px-4 py-2 text-green-600 bg-green-200 rounded hover:bg-indigo-600 focus:ring-2 focus:ring-indigo-500 border border-gray-200">
                Add Data Mahasiswa
            </button>
        </a>

        <a href="{{ route('mahasiswa-export')}}">
            <button class="px-4 py-2 text-green-600 bg-green-200 rounded hover:bg-indigo-600 focus:ring-2 focus:ring-indigo-500 border border-gray-200">
                Export Data Mahasiswa
            </button>
          </a>

          <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-4">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <tr class="bg-gray-100">
                <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">ID</th>
                <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">NPM</th>
                <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">Nama</th>
                <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">Prodi</th>
                <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">Aksi</th>
              </tr>
            </thead>
            <tbody>
             
              @foreach ($mahasiswa as $item)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                  <td class="px-4 py-2 border border-gray-200">{{ $loop->iteration }}
                  <td class="px-4 py-2 border border-gray-200">{{ $item->npm }}</td>
                  <td class="px-4 py-2 border border-gray-200">{{ $item->name }}</td>
                  <td class="px-4 py-2 border border-gray-200">{{ $item->prodi }}</td>
                
                  <td class="px-4 py-2 border border-gray-200">
                    <button class="px-2 text-red-600 hover:text-red-800" onclick="confirmDelete('{{ route('mahasiswa-delete', $item->id) }}')">| Hapus |</button>
                  </td>
                </tr>

              @endforeach
        
              <!-- Tambahkan baris lainnya sesuai kebutuhan -->
            </tbody>
          </table>

          {{-- Pagination --}}
          <div class="mt-4">
            {{ $mahasiswa->links() }}
            {{-- {{ $mahasiswa->appends(['search' => request('search')])->links() }} --}}
          </div>

        </div>
      </div>
        
      <script>
        function confirmDelete(deleteUrl) {
                if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                    // Jika user mengonfirmasi, kita dapat membuat form dan mengirimkan permintaan delete
                    let form = document.createElement('form');
                    form.method = 'POST';
                    form.action = deleteUrl;
       
                    // Tambahkan CSRF token
                    let csrfInput = document.createElement('input');
                    csrfInput.type = 'hidden';
                    csrfInput.name = '_token';
                    csrfInput.value = '{{ csrf_token() }}';
                    form.appendChild(csrfInput);
       
                    // Tambahkan method spoofing untuk DELETE (karena HTML form hanya mendukung GET dan POST)
                    let methodInput = document.createElement('input');
                    methodInput.type = 'hidden';
                    methodInput.name = '_method';
                    methodInput.value = 'DELETE';
                    form.appendChild(methodInput);
       
                    // Tambahkan form ke body dan submit
                    document.body.appendChild(form);
                    form.submit();
                }
            }
      </script>

    </x-app-layout>
    