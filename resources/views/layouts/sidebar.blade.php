   {{-- Sidebar --}}
   <div id="sidenav" class="fixed z-[9999999999] top-0 left-0 p3">
    <div class="close flex items-center justify-center relative pointer mb2 right">
        <div class="absolute cross bg-black left"></div>
        <div class="absolute cross bg-black right"></div>
    </div>

       <div class="flex items-center complex">
           <svg width="52" height="39" viewBox="0 0 52 39" fill="none" xmlns="http://www.w3.org/2000/svg">
               <line x1="4.12695" y1="19.5" x2="4.12695" y2="38.9925" stroke="#2A424F" stroke-width="4" />
               <line y1="-2" x2="19.3393" y2="-2"
                   transform="matrix(-0.662751 0.74884 -0.737003 -0.67589 14.8945 5.42188)" stroke="#2A424F"
                   stroke-width="4" />
               <line y1="-2" x2="19.356" y2="-2"
                   transform="matrix(-0.625314 0.780373 -0.769364 -0.638811 33.7109 4.36719)" stroke="#2A424F"
                   stroke-width="4" />
               <line y1="-2" x2="21.4848" y2="-2"
                   transform="matrix(0.756985 0.653433 -0.640054 0.76833 32.9785 6.50488)" stroke="#2A424F"
                   stroke-width="4" />
               <line y1="-2" x2="15.2292" y2="-2"
                   transform="matrix(0.7684 0.63997 -0.626481 0.779437 13.8301 6.50488)" stroke="#2A424F"
                   stroke-width="4" />
               <line x1="23.2773" y1="19.5" x2="23.2773" y2="38.9925" stroke="#2A424F" stroke-width="4" />
               <line x1="26.5957" y1="22.9146" x2="37.234" y2="22.9146" stroke="#2A424F" stroke-width="4" />
               <line x1="41.8945" x2="41.8945" y2="39" stroke="#2A424F" stroke-width="4" />
               <line x1="49.873" y1="19.5" x2="49.873" y2="38.9925" stroke="#2A424F" stroke-width="4" />
               <line y1="36.9927" x2="50" y2="36.9927" stroke="#2A424F" stroke-width="4" />
           </svg>

           <p id="sidebar-title" class="m5 bold"
               style = "margin-left: 15px; color: #2A424F; text-decoration: none; font-family: 'Inter', sans-serif; font-weight: 600; font-size: 24px;text-align: center;">
               testBackend</p>

       </div>



       <ul class="list-reset ">
           <li class="pointer mb3">

               <a class = "w-100 flex"
               href="{{ auth()->user()->role_id == 1 
               ? url('dashboardAdmin') 
               : (auth()->user()->role_id == 2 
                   ? url('dashboardApproval') 
                   : '#') }}"
                   style="color: #2A424F; text-decoration: none; font-family: 'Inter', sans-serif; font-weight: 600; font-size: 24px;">
                   <svg class="pointer" width="30" height="30" viewBox="0 0 30 30" fill="none"
                       xmlns="http://www.w3.org/2000/svg">
                       <path
                           d="M13.4531 3.73844V9.70763C13.4531 10.2019 13.3554 10.6913 13.1657 11.1477C12.976 11.6042 12.698 12.0187 12.3476 12.3674C11.9972 12.7162 11.5814 12.9924 11.1239 13.1801C10.6665 13.3679 10.1764 13.4635 9.68192 13.4614H3.74042C3.24724 13.4644 2.75854 13.3679 2.30361 13.1775C1.84868 12.9872 1.43689 12.707 1.09291 12.3538C0.744374 12.0071 0.46827 11.5946 0.280653 11.1404C0.0930365 10.6861 -0.0023487 10.1991 4.39207e-05 9.70763V3.75382C3.55776e-05 2.76091 0.393617 1.80843 1.09463 1.10489C1.79565 0.401356 2.747 0.00406933 3.74042 0H9.69731C10.19 0.000473097 10.6776 0.0986187 11.1321 0.288755C11.5865 0.47889 11.9987 0.757239 12.3448 1.10768C12.6957 1.45021 12.9745 1.8594 13.1648 2.31119C13.3551 2.76297 13.4531 3.24824 13.4531 3.73844ZM30 3.75382V9.70763C29.992 10.6981 29.5959 11.6459 28.8966 12.3477C28.1973 13.0496 27.2506 13.4494 26.2596 13.4614H20.2873C19.2918 13.4554 18.3373 13.0638 17.6244 12.3691C17.2761 12.0191 17.0003 11.6039 16.8128 11.1472C16.6252 10.6905 16.5297 10.2013 16.5316 9.70763V3.75382C16.5295 3.26103 16.6265 2.77285 16.8169 2.31827C17.0072 1.8637 17.2871 1.45202 17.6398 1.10768C17.9859 0.757239 18.3981 0.47889 18.8526 0.288755C19.307 0.0986187 19.7947 0.000473097 20.2873 0H26.2442C27.2378 0.00804159 28.1885 0.406114 28.8911 1.10836C29.5937 1.8106 29.992 2.76073 30 3.75382ZM30 20.2922V26.246C29.992 27.2364 29.5959 28.1843 28.8966 28.8861C28.1973 29.5879 27.2506 29.9878 26.2596 29.9998H20.2873C19.2854 30.01 18.319 29.6291 17.5937 28.9383C17.244 28.5893 16.9672 28.1742 16.7796 27.7173C16.592 27.2603 16.4972 26.7707 16.5008 26.2767V20.3229C16.4988 19.8302 16.5958 19.342 16.7862 18.8874C16.9766 18.4329 17.2564 18.0212 17.609 17.6768C17.9552 17.3264 18.3674 17.0481 18.8218 16.858C19.2763 16.6679 19.7639 16.5697 20.2566 16.5691H26.2134C27.2071 16.5772 28.1577 16.9752 28.8603 17.6775C29.5629 18.3797 29.9612 19.3299 29.9692 20.3229L30 20.2922ZM13.4531 20.3076V26.2614C13.441 27.2544 13.0388 28.2029 12.3333 28.9023C11.6278 29.6017 10.6756 29.9958 9.68192 29.9998H3.74042C3.24865 30.0018 2.76136 29.9065 2.30663 29.7194C1.85191 29.5322 1.43877 29.2569 1.09103 28.9094C0.743302 28.5618 0.467866 28.1489 0.280615 27.6944C0.0933652 27.2399 -0.00199239 26.7529 4.39207e-05 26.2614V20.3076C0.00400934 19.3144 0.398389 18.3627 1.09812 17.6575C1.79785 16.9524 2.74685 16.5505 3.74042 16.5384H9.69731C10.6954 16.5469 11.6507 16.9443 12.3602 17.646C13.0623 18.3539 13.4552 19.3109 13.4531 20.3076Z"
                           fill="#2A424F" />
                   </svg>
                   <span class="pointer" style="margin-left: 10px;">Dashboard</span>

               </a>

           </li>

           <li class="pointer mb3">
            <a class = "w-100 flex"
           href="{{ auth()->user()->role_id == 1 ? url('admin/reservations') : url('Approval/reservations') }}"


                style="color: #2A424F; text-decoration: none; font-family: 'Inter', sans-serif; font-weight: 600; font-size: 24px;">
                <svg width="34" height="34" viewBox="0 0 34 32" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10.3333 11.8335H10.35M17 11.8335H17.0167M23.6667 11.8335H23.6833M12 21.8335H5.33333C4.44928 21.8335 3.60143 21.4823 2.97631 20.8572C2.35119 20.2321 2 19.3842 2 18.5002V5.16683C2 4.28277 2.35119 3.43493 2.97631 2.80981C3.60143 2.18469 4.44928 1.8335 5.33333 1.8335H28.6667C29.5507 1.8335 30.3986 2.18469 31.0237 2.80981C31.6488 3.43493 32 4.28277 32 5.16683V18.5002C32 19.3842 31.6488 20.2321 31.0237 20.8572C30.3986 21.4823 29.5507 21.8335 28.6667 21.8335H20.3333L12 30.1668V21.8335Z"
                        stroke="#2A424F" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

                <span style="margin-left: 4px;">Reservation</span></a>
        </li>

        <li class="pointer mb3">
            <a class = "w-100 flex"
           href="{{ auth()->user()->role_id == 1 ? url('admin/reservations') : url('Approval/reservations') }}"


                style="color: #2A424F; text-decoration: none; font-family: 'Inter', sans-serif; font-weight: 600; font-size: 24px;">
                <svg width="34" height="34" viewBox="0 0 34 32" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10.3333 11.8335H10.35M17 11.8335H17.0167M23.6667 11.8335H23.6833M12 21.8335H5.33333C4.44928 21.8335 3.60143 21.4823 2.97631 20.8572C2.35119 20.2321 2 19.3842 2 18.5002V5.16683C2 4.28277 2.35119 3.43493 2.97631 2.80981C3.60143 2.18469 4.44928 1.8335 5.33333 1.8335H28.6667C29.5507 1.8335 30.3986 2.18469 31.0237 2.80981C31.6488 3.43493 32 4.28277 32 5.16683V18.5002C32 19.3842 31.6488 20.2321 31.0237 20.8572C30.3986 21.4823 29.5507 21.8335 28.6667 21.8335H20.3333L12 30.1668V21.8335Z"
                        stroke="#2A424F" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

                <span style="margin-left: 4px;">Report</span></a>
        </li>

        <li class="pointer mb3">
            <a class = "w-100 flex"
           href="{{ auth()->user()->role_id == 1 ? url('admin/reservations') : url('Approval/reservations') }}"


                style="color: #2A424F; text-decoration: none; font-family: 'Inter', sans-serif; font-weight: 600; font-size: 24px;">
                <svg width="34" height="34" viewBox="0 0 34 32" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10.3333 11.8335H10.35M17 11.8335H17.0167M23.6667 11.8335H23.6833M12 21.8335H5.33333C4.44928 21.8335 3.60143 21.4823 2.97631 20.8572C2.35119 20.2321 2 19.3842 2 18.5002V5.16683C2 4.28277 2.35119 3.43493 2.97631 2.80981C3.60143 2.18469 4.44928 1.8335 5.33333 1.8335H28.6667C29.5507 1.8335 30.3986 2.18469 31.0237 2.80981C31.6488 3.43493 32 4.28277 32 5.16683V18.5002C32 19.3842 31.6488 20.2321 31.0237 20.8572C30.3986 21.4823 29.5507 21.8335 28.6667 21.8335H20.3333L12 30.1668V21.8335Z"
                        stroke="#2A424F" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

                <span style="margin-left: 4px;">Vehicle</span></a>
        </li>

        <li class="pointer mb3">
            <a class = "w-100 flex"
           href="{{ auth()->user()->role_id == 1 ? url('admin/reservations') : url('Approval/reservations') }}"


                style="color: #2A424F; text-decoration: none; font-family: 'Inter', sans-serif; font-weight: 600; font-size: 24px;">
                <svg width="34" height="34" viewBox="0 0 34 32" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10.3333 11.8335H10.35M17 11.8335H17.0167M23.6667 11.8335H23.6833M12 21.8335H5.33333C4.44928 21.8335 3.60143 21.4823 2.97631 20.8572C2.35119 20.2321 2 19.3842 2 18.5002V5.16683C2 4.28277 2.35119 3.43493 2.97631 2.80981C3.60143 2.18469 4.44928 1.8335 5.33333 1.8335H28.6667C29.5507 1.8335 30.3986 2.18469 31.0237 2.80981C31.6488 3.43493 32 4.28277 32 5.16683V18.5002C32 19.3842 31.6488 20.2321 31.0237 20.8572C30.3986 21.4823 29.5507 21.8335 28.6667 21.8335H20.3333L12 30.1668V21.8335Z"
                        stroke="#2A424F" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

                <span style="margin-left: 4px;">Vehicle Usage</span></a>
        </li>

        
           <li class="pointer mb3">
            <a href= "{{ url('/') }}"class="w-100 flex" href="#logout" style="color: #2A424F; text-decoration: none; font-family: 'Inter', sans-serif; font-weight: 600; font-size: 24px;">
                   <svg width="34" height="32" viewBox="0 0 34 32" fill="none"
                       xmlns="http://www.w3.org/2000/svg">
                       <path
                           d="M30.2353 16.1176H13.4706M26.7059 21.4118L32 16.1176L26.7059 10.8235M17.8824 7.29412V5.52941C17.8824 4.59335 17.5105 3.69563 16.8486 3.03374C16.1867 2.37185 15.289 2 14.3529 2H5.52941C4.59335 2 3.69563 2.37185 3.03374 3.03374C2.37185 3.69563 2 4.59335 2 5.52941V26.7059C2 27.6419 2.37185 28.5397 3.03374 29.2016C3.69563 29.8634 4.59335 30.2353 5.52941 30.2353H14.3529C15.289 30.2353 16.1867 29.8634 16.8486 29.2016C17.5105 28.5397 17.8824 27.6419 17.8824 26.7059V24.9412"
                           stroke="#2A424F" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                   </svg>

                   <span style="margin-left: 4px;">Logout</span>
               </a>
           </li>


   </div>
