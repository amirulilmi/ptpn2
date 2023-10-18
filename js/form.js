$(document).ready(function () {
  $("#p_otomatis").click(function () {
    $("#p_manual").removeClass("metodeBayar-active");
    $("#p_otomatis").addClass("metodeBayar-active");
    $("#b_confirm_midtrans").removeClass("hidden");
    $("#b_confirm").addClass("hidden");
    $("#tf_ke").slideUp();
  });

  $("#p_manual").click(function () {
    $("#p_otomatis").removeClass("metodeBayar-active");
    $("#p_manual").addClass("metodeBayar-active");
    $("#b_confirm").removeClass("hidden");
    $("#b_confirm_midtrans").addClass("hidden");
    $("#tf_ke").slideDown();
  });

  $("#add_no_hp").click(function (e) {
    e.preventDefault();
    $("#list_no_lain").prepend(`<div id="per_nomor" class=" w-full"> 
                <label class="block my-3 w-full">
                  <span
                    class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">
                    Nomor telepon peserta lain
                  </span>
                  
                  <div class="flex items-center">
                  <input type="text" name="no_hp_lain[]"
                      class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                      placeholder="Masukkan nomor telepon anda" />
                    <button id="remove_no_hp" class="bg-red-500 rounded-lg text-white mx-3">
                    <img src="./assets/vector/close-square.svg" alt="">
                    </button>
                  </div> 
                </label>
              </div>`);
  });

  $(document).on("click", "#remove_no_hp", function (e) {
    e.preventDefault();
    let listNoLain = $(this).parent().parent();
    $(listNoLain).remove();
  });

  $("#daftar").submit(function (e) {
    e.preventDefault();
    $("#b_confirm").val("Proses ...");
    $.ajax({
      type: "post",
      url: "action.php",
      data: $(this).serialize(),
      // dataType: "dataType",
      success: function (response) {
        console.log(response);
      },
    });
  });
});
