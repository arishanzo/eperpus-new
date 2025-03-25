
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
                Data Buku
              </h2>

             

              <nav>
                <ol class="flex items-center gap-2">
                  <li>
                    <a class="font-medium" href="/">Dashboard /</a>
                  </li>
                  <li>
                    <a class="font-medium"   href="{{ route('data_buku.index') }}">Data Buku /</a>
                  </li>
                  <li class="font-medium text-primary">Tambah Buku</li>
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
                <form action="{{ route('data_buku.store') }}" method="POST">
                @csrf

                
             <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium mb-2">Judul Buku</label>
            <input type="text" id="judulbuku" name="judulbuku"
                class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
        </div>

               <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium mb-2">Pengarang</label>
            <input type="text" id="pengarang" name="pengarang"
                class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
        </div>

        <div class="mb-4">
            <label for="gender" class="block text-gray-700 font-medium mb-2">Kategori</label>
            <select id="status" name="kategori"
                class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
                <option value="fiksi">Fiksi</option>
                <option value="non_fiksi">Non Fiksi</option>
                <option value="pelajaran">Pelajaran</option>
                <option value="lainnya">Lainnya</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium mb-2">ISBN</label>
            <input type="text" id="isbn" name="isbn"
                class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
        </div>

        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium mb-2">Tahun Terbit</label>
            <select id="tahunterbit" name="tahunterbit"
                class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
                <?php   
                $now=date('Y');    for ($a=2000;$a<=$now;$a++){

                        echo "<option value=' ".$a." '>".$a."</option>";

                    }

                    ?>
            </select>        </div>

            <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium mb-2">Jumlah Stock</label>
            <input type="number" id="jumlahsalinan" name="jumlahsalinan"
                class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
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