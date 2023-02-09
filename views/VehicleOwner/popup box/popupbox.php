<section>
    <button class="show-modal">Next</button>
    <span class="overlay"></span>

    <div class="modal-box">
        <i class="fa-regular fa-circle-check"></i>
        <h2>Completed</h2>
        <h3>You have sucessfully sent Add New Vehicle request.</h3>

        <div class="buttons">
            <button class="close-btn">Ok, Close</button>
            <!-- <button></button> -->
        </div>
    </div>
</section>

<script>
    const section = document.querySelector("section"),
        overlay = document.querySelector(".overlay"),
        showBtn = document.querySelector(".show-modal"),
        closeBtn = document.querySelector(".close-btn");

    showBtn.addEventListener("click", () => section.classList.add("active"));

    overlay.addEventListener("click", () =>
        section.classList.remove("active")
    );

    closeBtn.addEventListener("click", () =>
        section.classList.remove("active")
    );
</script>