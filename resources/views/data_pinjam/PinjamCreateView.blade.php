
<x-layout>

<x-slot:judul>{{ $judul }}</x-slot:judul>

</x-layout>
<main>
          <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
           
@if(session('info'))

            
<div class="alert alert-success alert-dismissible mb-8 fade show" role="alert">

<div class="flex flex-col max-w-full mx-auto">
<div class="flex inline-flex justify-between bg-teal-100 border border-teal-400 text-teal-700 px-4 py-3 my-2 rounded "
    role="alert">
    <span class="block sm:inline pl-2">
        <strong class="font-bold">Info</strong>
        {{ session('info') }}
    </span>
    <span class="inline" onclick="return this.parentNode.remove();">
        <svg class="fill-current h-6 w-6" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <title>Close</title>
            <path
                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
        </svg>
    </span>
</div>
</div>
@endif
            <div
              class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between"
            >
              <h2 class="text-title-md2 font-bold text-black dark:text-white">
                Data Pinjam
              </h2>

             

              <nav>
                <ol class="flex items-center gap-2">
                  <li>
                    <a class="font-medium" href="/">Dashboard /</a>
                  </li>
                  <li>
                    <a class="font-medium"   href="{{ route('data_pinjam.index') }}">Data Pinjam /</a>
                  </li>
                  <li class="font-medium text-primary">Tambah Pinjam</li>
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
                <form action="{{ route('data_pinjam.store') }}" method="POST">
                @csrf

                <div class="mb-4">
            <label for="gender" class="block text-gray-700 font-medium mb-2">Buku</label>
            <select id="id_buku" name="id_buku"
                class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
                <option value="fiksi">Pilih Buku</option>
                <?php

                        foreach ($buku as $dt_buku) {

                            if ($dt_buku['jumlahsalinan'] == 0){
                        ?>

                        
                            <option value="<?= $dt_buku['id_buku'] ?>" disabled ><?= $dt_buku['judul_buku'] ?></option>

                        <?php
                            }else{
                                ?>

                        <option value="<?=$dt_buku['id_buku'] ?>"><?= $dt_buku['judul_buku'] ?></option>

                                                        <?php
                            }

                        }

                        ?>
            </select>
        </div>


        <div class="mb-4">
            <label for="gender" class="block text-gray-700 font-medium mb-2">Nama Santri</label>
            <select id="id_santri" name="id_santri"
                class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
                <option value="fiksi">Pilih Santri</option>
                <?php

                        foreach ($santri as $dt_santri) {

                        ?>

                        
                            <option value="<?= $dt_santri['id_santri'] ?>"><?= $dt_santri['nama_santri'] ?></option>

                        <?php
                        }

                        ?>
            </select>
        </div>


               <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium mb-2">Total Pinjaman</label>
            <input type="number" id="totalpinjam" name="totalpinjam"
                class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
        </div>

     
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium mb-2">Tanggal Pinjaman</label>
            <input type="date" id="tglpinjam" name="tglpinjam"
                class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
        </div>

        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium mb-2">Tanggal Kembalian</label>
            <input type="date" id="tglpengembalian" name="tglpengembalian"
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