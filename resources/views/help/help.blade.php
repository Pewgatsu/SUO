<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Help</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="{{ asset('js/app.js') }}"></script>

    {{--    for toast--}}
    <script src="https://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>



</head>
<body class="bg-light">
@include('layouts.header')
@include('layouts.subheader')


<div class="container mt-3">
    <div class="card mb-3" style="width: auto;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{asset('images/help_guide.jpeg')}}" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="card-title fw-bold">Guide</h3>
                    <p class="card-text fs-6 mt-3">The system builder is a tool made to assist users in building their own system unit. The system will automatically
                    recommend the user parts that are compatible with each other. Additionally, this section contains details about the components, their purpose, and their importance in a system unit.
                    Users can refer to this section as a guide for a brief explanation for each components.</p>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="container bg-light mt-3 mb-3">

    <div class="accordion accordion-flush" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    Central Processing Unit (CPU)
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>The CPU is the main chip in a computer, responsible for carrying out all tasks.</strong> When you’re determining which CPU to install, pay attention to the gigahertz (GHz) – the higher the GHz, the faster the processor. However, more GHz also means the CPU consumes more energy, which could lead to higher system temperatures that require better airflow or heat dissipation within the computer.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Motherboard
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>A motherboard is the first component you’ll want to choose.</strong>  The motherboard dictates the physical form factor and size of your PC build, but it also determines what other pieces of hardware the computer can use. For example, the motherboard establishes the power of the processor it can handle, the memory technology (DDR4, DDR3, DDR2, etc.) and number of modules that can be installed, and the storage form factor (2.5-inch, mSATA, or m.2) and storage interface (SATA or PCIe). While you will want to choose your motherboard based on other compatible components, the motherboard should be your starting point.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Graphic Cards (GPU)
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    GPU stands for graphical processing unit. <strong>If you’re creating a gaming PC, then this will be the most important part for you. </strong> There are two main types of GPUs, the integrated GPU (iGPU) and a discrete GPU. The integrated GPU is integrated into the CPU. This means, some CPUs already have a graphics chip built-in and you will not need an additional GPU to attach a monitor to. Integrated GPUs are usually good enough for light tasks such as word-processing. As soon as you want to dive into graphics-heavy tasks such as 3D GPU Rendering, High-End Gaming, Video Editing, Graphic Design, and many others, you will have to get yourself a discrete GPU.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                    Random Access Memory (RAM)
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>Adding memory (RAM) is one of the fastest, easiest, and most affordable ways to amplify the performance of the computer you’re building because it gives your system more available space to temporarily store data that’s being used.</strong> Nearly every computer operation relies on memory – that includes having several tabs open while surfing the Web, typing and composing an email, multitasking between applications, and even moving your mouse cursor. Even background services and processes, like system updates, can draw from your RAM and that’s why it’s important to have as much memory as possible. <strong>The more things you’re doing, the more memory you need.</strong>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
                    Power Supply (PSU)
                </button>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>This is the main source of power that will supply the whole computer.</strong> This is what converts AC to DC power from your home socket to components. The important thing is to know how much wattage your current PC Build will need to run stable and possibly how much you will need in the future if you are planning on adding more components, like extra/stronger GPUs or Storage Drives.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingSix">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseThree">
                    Storage
                </button>
            </h2>
            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="collapseSix" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>Your files and data are saved long-term on your storage drive.</strong> This data is held on either a hard disk drive (HDD) or solid state drive (SSD). Although hard drives generally give you more storage space (in GB), SSDs have essentially made them outdated – SSDs are on average 6x faster and 90x more energy-efficient than hard drives.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingSeven">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseThree">
                    Computer Case
                </button>
            </h2>
            <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="collapseSeven" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>Cases come in different form factors, depending on the size of the PC you wish to build. </strong> Sizes may vary based from the motherboard's form factor such as mATX, ATX, mini-ATX, or Full Tower. Cases will serve as the 'house' of your system unit.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingEight">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseThree">
                    CPU Cooler
                </button>
            </h2>
            <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="collapseEight" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Anything that draws power also generates heat and the<strong> The CPU generates lots of heat.</strong> A CPU cooler is recommended so that the CPU is cooled and operates flawlessly. The CPU cooler should be compatible with the CPU socket and motherboard socket.
                 </div>
             </div>
         </div>

        </div>

    </div>

</div>

<div class="container">
    <div class="card" style="width: auto;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{asset('images/help_image.jpeg')}}" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="card-title fw-bold">Need Help in Assembling?</h3>
                    <p class="card-text fs-6">You can contact the seller using the number found on the store's profile.</p>

                </div>
            </div>
        </div>
    </div>
</div>



</body>

</html>
