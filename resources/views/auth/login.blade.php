
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
      Login E-Perpus
    </title>
    @vite('resources/css/app.css')
  <link rel="icon" href="favicon.ico">
  
  <link href="css/style.css" rel="stylesheet">
  
  <script nonce="fa0dd7a2-9cc2-4507-a3c2-decf556e7e38">try{(function(w,d){!function(j,k,l,m){if(j.zaraz)console.error("zaraz is loaded twice");else{j[l]=j[l]||{};j[l].executed=[];j.zaraz={deferred:[],listeners:[]};j.zaraz._v="5811";j.zaraz._n="fa0dd7a2-9cc2-4507-a3c2-decf556e7e38";j.zaraz.q=[];j.zaraz._f=function(n){return async function(){var o=Array.prototype.slice.call(arguments);j.zaraz.q.push({m:n,a:o})}};for(const p of["track","set","debug"])j.zaraz[p]=j.zaraz._f(p);j.zaraz.init=()=>{var q=k.getElementsByTagName(m)[0],r=k.createElement(m),s=k.getElementsByTagName("title")[0];s&&(j[l].t=k.getElementsByTagName("title")[0].text);j[l].x=Math.random();j[l].w=j.screen.width;j[l].h=j.screen.height;j[l].j=j.innerHeight;j[l].e=j.innerWidth;j[l].l=j.location.href;j[l].r=k.referrer;j[l].k=j.screen.colorDepth;j[l].n=k.characterSet;j[l].o=(new Date).getTimezoneOffset();if(j.dataLayer)for(const t of Object.entries(Object.entries(dataLayer).reduce(((u,v)=>({...u[1],...v[1]})),{})))zaraz.set(t[0],t[1],{scope:"page"});j[l].q=[];for(;j.zaraz.q.length;){const w=j.zaraz.q.shift();j[l].q.push(w)}r.defer=!0;for(const x of[localStorage,sessionStorage])Object.keys(x||{}).filter((z=>z.startsWith("_zaraz_"))).forEach((y=>{try{j[l]["z_"+y.slice(7)]=JSON.parse(x.getItem(y))}catch{j[l]["z_"+y.slice(7)]=x.getItem(y)}}));r.referrerPolicy="origin";r.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(j[l])));q.parentNode.insertBefore(r,q)};["complete","interactive"].includes(k.readyState)?zaraz.init():j.addEventListener("DOMContentLoaded",zaraz.init)}}(w,d,"zarazData","script");window.zaraz._p=async bs=>new Promise((bt=>{if(bs){bs.e&&bs.e.forEach((bu=>{try{const bv=d.querySelector("script[nonce]"),bw=bv?.nonce||bv?.getAttribute("nonce"),bx=d.createElement("script");bw&&(bx.nonce=bw);bx.innerHTML=bu;bx.onload=()=>{d.head.removeChild(bx)};d.head.appendChild(bx)}catch(by){console.error(`Error executing script: ${bu}\n`,by)}}));Promise.allSettled((bs.f||[]).map((bz=>fetch(bz[0],bz[1]))))}bt()}));zaraz._p({"e":["(function(w,d){})(window,document)"]});})(window,document)}catch(e){throw fetch("/cdn-cgi/zaraz/t"),e;}; </script> 
  
  </head>

  <body>
<div class="flex min-h-screen w-full flex-wrap items-stretch bg-white max-md:pb-20 max-md:pt-32">
    <div class="grow md:flex md:w-1/2  md:flex-col md:items-center md:justify-center md:py-20">
    
  
        <div class="w-full  px-4 text-center text-xs lg:w-1/2">
            <h1 class="mb-20 text-2xl font-bold text-gray-800">Login E-Perpus</h1>


            @if(session('success'))

            
<div class="alert alert-success alert-dismissible mb-8 fade show" role="alert">

<div class="flex flex-col max-w-full mx-auto">
<div class="flex inline-flex justify-between bg-teal-100 border border-teal-400 text-teal-700 px-4 py-3 my-2 rounded "
    role="alert">
    <span class="block sm:inline pl-2">
        <strong class="font-bold">Success</strong>
        {{ session('success') }}
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


@if($errors->any())
    <div class="alert alert-danger alert-dismissible mb-8 fade show" role="alert">
        <div class="flex flex-col max-w-full mx-auto">
            <div class="flex inline-flex justify-between bg-red-100 border border-red-400 text-red-700 px-4 py-3 my-2 rounded" role="alert">
                <span class="block sm:inline pl-2">
                    <strong class="font-bold">Login Gagal!</strong>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </span>
                <span class="inline" onclick="return this.parentNode.remove();">
                    <svg class="fill-current h-6 w-6" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Close</title>
                        <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </span>
            </div>
        </div>
    </div>
@endif

         
            <form class="flex flex-col gap-6" action="{{ route('login') }}" method="POST">
                @csrf


                <div class="relative mb-4">
                    <label class="flex cursor-pointer items-center gap-2 text-xs font-medium leading-none text-gray-700  mb-3" for="username">
                        <span class="font-semibold text-md">Username</span>
                        @error('username') <span style="color:red;">{{ $message }}</span> @enderror

                    </label>
                    <input id="username" type="text" name="username" class="block peer w-full px-4 py-3 border border-gray-300 bg-gray-100 text-gray-800 placeholder-gray-500  placeholder-gray-400 transition-colors focus:border-indigo-500 focus:outline-0 focus:ring focus:ring-indigo-200 " name="" value="" type="email" placeholder="Masukan Username Anda">
                </div>

                <div class="relative mb-4">
                    <label class="flex cursor-pointer items-center gap-2 text-xs font-medium leading-none text-gray-700  mb-3" for="password">
                        <span class="font-semibold text-md">Password</span>
                        @error('password') <span style="color:red;">{{ $message }}</span> @enderror

                    </label>
                    <div class="relative">
                        <input id="password" type="password" name="password" class="block peer w-full px-4 py-3 border border-gray-300 bg-gray-100 text-gray-800 placeholder-gray-500  placeholder-gray-400 transition-colors focus:border-indigo-500 focus:outline-0 focus:ring focus:ring-indigo-200 " name="" value="" :type="type" placeholder="Masukan Passowrd Anda">
                        
                    </div>
                </div>

                <input class="hidden" id="recaptcha" value="0">
                <button class="lqd-btn group inline-flex items-center justify-center gap-1.5 font-medium rounded-full transition-all hover:-translate-y-0.5 hover:shadow-xl lqd-btn-primary bg-indigo-600 text-white hover:bg-indigo-500 focus-visible:bg-indigo-700 focus-visible:shadow-indigo-300/10 px-5 py-3" id="LoginFormButton" type="submit">
                    Sign in
                </button>
                <div class="text-gray-600 pt-20 ">
                    Pengembang Aplikasi by Aris
                    <a class="font-medium text-indigo-600 underline" href="/terms" target="_blank">Terms and
                        Conditions</a>
                    and
                    <a class="font-medium text-indigo-600 underline" href="/privacy-policy" target="_blank">Privacy
                        Policy</a>.
                </div>
            </form>
            <div class="pt-4 text-gray-600 text-bold ">
                Tidak Punya Akun
                <a class="font-medium text-indigo-600 underline" href="{{ route('register') }}">Sign up</a>
            </div>
        </div>
    </div>

    <div class="hidden flex-col justify-center overflow-hidden bg-cover bg-center md:flex md:w-1/2"
        style="background-image: url(https://img.freepik.com/free-vector/library-interior-empty-room-reading-with-books-wooden-shelves_33099-1722.jpg)">
          </div>
</div>

  </body>