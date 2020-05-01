function numericKeyboard(){
    let Keyboard = window.SimpleKeyboard.default;

    let selectedInput;

    let keyboard = new Keyboard({
      onChange: input => onChange(input),
      onKeyPress: button => onKeyPress(button),
      layout: {
        default: ["1 2 3", "4 5 6", "7 8 9", "{shift} 0 _", "{bksp}"],
        shift: ["! / #", "$ % ^", "& * (", "{shift} ) +", "{bksp}"]
      },
      theme: "hg-theme-default hg-layout-numeric numeric-theme",
		width: 1000px

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

}

function defaultKeyboard(){
    let Keyboard = window.SimpleKeyboard.default;

    let selectedInput;

    let keyboard = new Keyboard({
      onChange: input => onChange(input),
      onKeyPress: button => onKeyPress(button)

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

}
