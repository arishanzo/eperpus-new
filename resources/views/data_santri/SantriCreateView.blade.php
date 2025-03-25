
<x-layout>

<x-slot:judul>{{ $judul }}</x-slot:judul>
 
</x-layout>
<main>
          <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
            <!-- Breadcrumb Start -->
            <div
              class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between"
            >
              <h2 class="text-title-md2 font-bold text-black dark:text-white">
                Data Santri
              </h2>

             

              <nav>
                <ol class="flex items-center gap-2">
                  <li>
                    <a class="font-medium" href="/">Dashboard /</a>
                  </li>
                  <li>
                    <a class="font-medium"   href="{{ route('data_santri.index') }}">Data Santri /</a>
                  </li>
                  <li class="font-medium text-primary">Tambah Data Santri</li>
                </ol>
              </nav>
            </div>


            <div class="flex flex-col gap-5 md:gap-7 2xl:gap-10 pt-8">
              <!-- ====== Data Table One Start -->
              <div
                class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark"
              >
                <div
                  class="data-table-common data-table-one max-w-full overflow-x-auto p-8"
                >
                <form action="{{ route('data_santri.store') }}" method="POST">
                @csrf
             <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium mb-2">Nama Santri</label>
            <input type="text" id="namasantri" name="namasantri"
                class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
        </div>

               <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium mb-2">NIS</label>
            <input type="text" id="nis" name="nis"
                class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
        </div>

        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium mb-2">Kelas</label>
            <input type="text" id="kelas" name="kelas"
                class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
        </div>

        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium mb-2">Asrama</label>
            <input type="text" id="asrama" name="asrama"
                class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
        </div>

        <div class="mb-4">
            <label for="gender" class="block text-gray-700 font-medium mb-2">Status</label>
            <select id="status" name="status"
                class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
                <option value="">Select Status</option>
                <option value="aktif">Aktif</option>
                <option value="tidak aktif">Tidak Aktif</option>
            </select>
        </div>

        <button type="Submit"
    class="mt-5 tracking-wide font-semibold bg-indigo-500 text-gray-100 w-full py-4 rounded-lg hover:bg-indigo-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
          Simpan
    </button>
                   </form>
                </div>
              </div>
              <!-- ====== Data Table One End -->

            </div>
          </div>
        </main>
        <!-- ===== Main Content End ===== -->
      </div>
      <!-- ===== Content Area End ===== -->
    </div>
    <!-- ===== Page Wrapper End ===== -->
 <x-footer></x-footer>