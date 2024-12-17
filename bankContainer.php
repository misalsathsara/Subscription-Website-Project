<!-- Bank Section Start -->
<section class="scrolling-logos light">
    <div class="container-fluid">
        <div class="text-center mb-5">
            <h2 class="text-center display-4 fw-bold text-primary section-heading" style="font-weight: 900;">
                Meet Our Partners</h2>
            <div class="divider mb-4"></div>
        </div>
        <div class="logos-wrapper">
            <div class="logos d-flex justify-content-center align-items-center text-center">
                <img src="./Images/Commercial-Bank.png" alt="Commercial Bank"
                    class="scrolling-logo img-fluid px-5 my-4" />
                <img src="./Images/hnb.png" alt="HNB" class="scrolling-logo img-fluid px-5 my-4" />
                <img src="./Images/logo-dfccbank.png" alt="DFCC Bank" class="scrolling-logo img-fluid px-5 my-4" />
                <img src="./Images/Nations_Trust_Bank_logo.png" alt="Nations Trust Bank"
                    class="scrolling-logo img-fluid px-5 my-4" />
                <img src="./Images/ndb.png" alt="NDB" class="scrolling-logo img-fluid px-5 my-4" />
                <img src="./Images/sampath bank.png" alt="Sampath Bank" class="scrolling-logo img-fluid px-5 my-4" />
                <img src="./Images/boc.png" alt="boc Bank" class="scrolling-logo img-fluid px-5 my-4" />
                <img src="./Images/helapay.png" alt="helapay" class="scrolling-logo img-fluid px-5 my-4" />
                <!-- Repeat logos to create a continuous effect -->
                <img src="./Images/Commercial-Bank.png" alt="Commercial Bank"
                    class="scrolling-logo img-fluid px-5 my-4" />
                <img src="./Images/hnb.png" alt="HNB" class="scrolling-logo img-fluid px-5 my-4" />
                <img src="./Images/logo-dfccbank.png" alt="DFCC Bank" class="scrolling-logo img-fluid px-5 my-4" />
                <img src="./Images/Nations_Trust_Bank_logo.png" alt="Nations Trust Bank"
                    class="scrolling-logo img-fluid px-5 my-4" />
                <img src="./Images/ndb.png" alt="NDB" class="scrolling-logo img-fluid px-5 my-4" />
                <img src="./Images/sampath bank.png" alt="Sampath Bank" class="scrolling-logo img-fluid px-5 my-4" />
                <img src="./Images/boc.png" alt="boc Bank" class="scrolling-logo img-fluid px-5 my-4" />
                <img src="./Images/helapay.png" alt="helapay" class="scrolling-logo img-fluid px-5 my-4" />
            </div>
        </div>
    </div>
</section>


<!-- Additional Styles -->
<style>
.scrolling-logos {
    background-color: #f6f6f6;
    overflow: hidden;
    padding: 60px 0;
}

@media (min-width: 768px) {
    .scrolling-logos {
        padding: 80px 0;
    }
}

.scrolling-logos-heading {
    font-weight: bold;
    font-size: 25px;
    color: #28303b;
}

@media (min-width: 768px) {
    .scrolling-logos-heading {
        font-size: 35px;
    }
}

.logos-wrapper {
    width: 100%; /* Ensures the wrapper spans the full width */
    overflow: hidden;
}


.logos {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    width: max-content;
    /* Ensure logos are wide enough for the container */
    animation: scroll-left 40s linear infinite;
    /* Slowed down the animation duration */
}

.scrolling-logo {
    max-height: 50px;
}

@keyframes scroll-left {
    0% {
        transform: translateX(0);
        /* Start at the original position */
    }

    100% {
        transform: translateX(-50%);
        /* Move to the left by 50% to slow down and create a smoother loop */
    }
}
</style>
<!-- Bank Section End -->