<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-keyboard@latest/build/css/index.css">
<!-- <div class="simple-keyboard" style="display: fixed;position: absolute;bottom: 0; left: 20%;right: 20%; width: 60%;background:black;display: none;z-index: 99999;"></div> -->
<div class="container p-5" style="background: <?= $setting['set_background'] ?>;">
    <div class="row">
        <div class="col-md-2">
            <img src="<?= base_url() ?>assets/upload/logo/<?= $instansi['instansi_logo'] ?>" alt="rusak" width="80" height="80" class="border">
        </div>
        <div class="col-md-8 text-center pt-4">
            <h1><?= $instansi['instansi_nama'] ?></h1>    
        </div>
        <div class="col-md-2 text-right">
            <img src="<?= base_url() ?>assets/upload/logo/<?= $instansi['instansi_logo'] ?>" alt="rusak" width="80" height="80" class="border">
        </div>
    </div>
    <hr>
    

    <form action="<?= base_url() ?>mntr3/step1" method="POST">
     
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3 pt-4">
                    <h4>Nomor Responden</h4>
                </div>
                <div class="col-md-5">
                    <input type="number" class="input form-control" name="no_responden" autocomplete="off">
                    <div class="simple-keyboard" style="display: none;height: 70%;margin-bottom: 0;"></div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-12 pt-4">
                    <h4>Silahkan isi data diri anda :</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 pt-4">
                    <h4>Nama</h4>
                </div>
                <div class="col-md-5">
                    <input type="text" class="input form-control" name="nama"  required autocomplete="off">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 pt-4">
                    <h4>Umur</h4>
                </div>
                <div class="col-md-5">
                    <input type="number" min="1" max="99" class="input form-control" name="umur" required  autocomplete="off">
                </div>
                <div class="col-md-2 pt-4">
                    <h4>Tahun</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 pt-4">
                    <h4>Jenis Kelamin</h4>
                </div>
                <div class="col-md-5 pt-3">
                    <select name="jk" class="form-control" required>
                        <option disabled selected>- Pilih Jenis Kelamin -</option>
                        <option>Pria</option>
                        <option>Wanita</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 pt-4">
                    <h4>Pendidikan Terakhir</h4>
                </div>
                <div class="col-md-5 pt-3">
                    <select name="pendidikan" class="form-control" required>
                        <option disabled selected>- Pilih Pendidikan -</option>
                        <option>SD</option>
                        <option>SLTP</option>
                        <option>SLTA</option>
                        <option>D1-D2-D3</option>
                        <option>S1</option>
                        <option>S2 Keatas</option>
                    </select>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3 pt-4">
                    <h4>Pekerjaan Utama</h4>
                </div>
                <div class="col-md-5 pt-3">
                    <select name="pekerjaan" class="    " required>
                        <option disabled selected>- Pilih Pekerjaan -</option>
                        <option>PNS/TNI/POLRI</option>
                        <option>WIRASWASTA</option>
                        <option>PEGAWAI SWASTA</option>
                        <option>PELAJAR/MAHASISWA</option>
                        <option>LAINNYA</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 pt-4">
                    <h5>Note : Data identitas anda akan kami rahasiakan !</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12 text-center">
            <button type="submit" name="lanjut" class="btn btn-success btn-lg" style="width: 40%; height: 40pt; font-size: 20pt;">LANJUT</button>
        </div>
    </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/simple-keyboard@latest/build/index.min.js"></script>

<script>
    



    $( ".input" ).focus(function() {
        $('.simple-keyboard').css('display', 'block');
    });
    // $( ".input" ).blur(function() {
    //     $('.simple-keyboard').css('display', 'none');
    // });


    
    
</script>
<!-- <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script> -->
<script>


let Keyboard = window.SimpleKeyboard.default;

let selectedInput;

let keyboard = new Keyboard({
  onChange: input => onChange(input),
  onKeyPress: button => onKeyPress(button),
  layout: {
    default: ["1 2 3", "4 5 6", "7 8 9", "{shift} 0 _", "{bksp}"],
    shift: ["! / #", "$ % ^", "& * (", "{shift} ) +", "{bksp}"]
  },
  theme: "hg-theme-default hg-layout-numeric numeric-theme"

});

document.querySelectorAll(".input").forEach(input => {
  input.addEventListener("focus", onInputFocus);
  // Optional: Use if you want to track input changes
  // made without simple-keyboard
  input.addEventListener("input", onInputChange);
});

function onInputFocus(event) {
  console.log(event.target);
  selectedInput = `input[name="${event.target.name}"]`;
  keyboard.setOptions({
    inputName: event.target.name
  });
}

function onInputChange(event) {
  keyboard.setInput(event.target.value, event.target.name);
  
}

function onChange(input) {
  console.log("Input changed", input);
  document.querySelector(selectedInput || ".input").value = input;

}

function onKeyPress(button) {
  console.log("Button pressed", button);

  /**
   * Shift functionality
   */
  if (button === "{lock}" || button === "{shift}") handleShiftButton();
}

function handleShiftButton() {
  let currentLayout = keyboard.options.layoutName;
  let shiftToggle = currentLayout === "default" ? "shift" : "default";

  keyboard.setOptions({
    layoutName: shiftToggle
  });
}
</script>
