<h2 class="name">Assign Drivers</h2>

<div class="be-driver">
    <p class="q1-txt">Do you want to become a driver?</p>
    <label class="switch">
        <input type="checkbox">
        <span class="slider round"></span>
    </label>
</div>


<div class="assign-driver">
    <p class="q2-txt">Do you want to assign a driver/drivers for your own vehicle?</p>
    <div class="q2-switch">
        <label class="switch">
            <input type="checkbox">
            <span class="slider round"></span>
        </label>

    </div>


</div>




<!-- toggle button css part -->


<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
        margin-left: 1000px;



    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
        border-color: black;
        align-self:flex-end;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: rgb(237, 229, 229);
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #f3bb21;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px#f3c221;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;

    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>




<!-- cards html part -->
<body>
<section class="container">
    <div class="card">
        <div class="image">
            <img src="images/img1.jpg" alt="" />
        </div>
        <h3>Someone Name</h3>

        <div>
            <button type="submit" class="btn">Assign</button>
        </div>

    </div>
    <div class="card">
        <div class="image">
            <img src="images/img2.jpg" alt="" />
        </div>
        <h3>Someone Name</h3>
        <div>
            <button type="submit" class="btn">Assign</button>
        </div>

    </div>
    <div class="card">
        <div class="image">
            <img src="images/img3.jpg" alt="" />
        </div>
        <h3>Someone Name</h3>
        <div>
            <button type="submit" class="btn">Assign</button>
        </div>

    </div>
    <div class="card">
        <div class="image">
            <img src="images/img4.jpg" alt="" />
        </div>
        <h3>Someone Name</h3>

        <div>
            <button type="submit" class="btn">Assign</button>
        </div>
    </div>

</section>
<div class="next-pg-btn">
    <button class="next-page-button">Next >></button>
</div>