@push('head')
<link href="{{URL::asset('/paper/css/tailwind.min.css')}}" rel="stylesheet">
@endpush

<div id="pin-section" style="display: none">
    <form action="#" method="post">
        <!-- This is the div where the otp fields are generated by Javascript -->
        <span class="col-md-8">Voer uw 6-cijferige pincode in</span>
        <div class="flex justify-center " id="OTPInput">
        </div>

        <!-- Change this name attribute to mach your form submission parameters. Make sure you update the id in the javascript code if any changes are made to the id attribute -->
        <input hidden id="otp" name="otp" value="">
        <button class="btn btn-warning btn-round col-md-12" id="pinSubmit" onclick="showPinLogin()">
            Login
        </button>
    </form>
</div>

@push('scripts')
<script>
    /* This creates all the OTP input fields dynamically. Change the otp_length variable  to change the OTP Length */
    const $otp_length = 6;
    
    const element = document.getElementById('OTPInput');
    for (let i = 0; i < $otp_length; i++) {
        let inputField = document.createElement('input'); // Creates a new input element
        inputField.className = "w-12 h-12 bg-gray-300 border-gray-100 outline-none focus:bg-mgray-200 m-2 text-center rounded focus:border-blue-400 focus:shadow-outline";
        // Do individual OTP input styling here;
        inputField.style.cssText = "color: transparent; text-shadow: 0 0 0 gray;"; // Input field text styling. This css hides the text caret
        inputField.id = 'otp-field' + i; // Don't remove
        inputField.maxLength = 1; // Sets individual field length to 1 char
        element.appendChild(inputField); // Adds the input field to the parent div (OTPInput)
    }
    
    /*  This is for switching back and forth the input box for user experience */
    const inputs = document.querySelectorAll('#OTPInput > *[id]');
    inputs[0].focus()
    for (let i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener('keydown',(event) => {
            if (event.key === "Backspace") {
                inputs[i].value = '';
                if (i !== 0) {
                    inputs[i - 1].value =''
                    inputs[i - 1].focus();
                }
            }
            // if (event.key === "ArrowLeft" && i !== 0) return inputs[i - 1].focus();
            // if (event.key === "ArrowRight" && i !== inputs.length - 1) return inputs[i + 1].focus();
            if (event.key === "Enter") return submitOTP()
            if (!isFinite(event.key)) return event.preventDefault()
        });

        inputs[i].addEventListener('focus', ()=>{
            if (inputs[i-1]?.value === ''){
                inputs[i-1].focus();
            }
            if (inputs[i].value !== '') return inputs[i + 1].focus()

        });
        inputs[i].addEventListener('keyup', ()=>{
            if (inputs[inputs.length - 1].value !== '' ){
                submitOTP()
            }

        });
        inputs[i].addEventListener('input', function () {
            if (inputs[i].value !== '') return inputs[i + 1]?.focus() 
        });

    }
    /*  This is to get the value on pressing the submit button
    *   In this example, I used a hidden input box to store the otp after compiling data from each input fields
    *   This hidden input will have a name attribute and all other single character fields won't have a name attribute
    *   This is to ensure that only this hidden input field will be submitted when you submit the form */

   const submitOTP = ()=>{
       const inputs = document.querySelectorAll('#OTPInput > *[id]');
       let compiledOtp = '';
       inputs.forEach((input)=> compiledOtp += input.value)
       axios.get('/sanctum/csrf-cookie')
       .then(
        axios.post('api/login/pin',{
                pincode:compiledOtp
        })
        .then(({data})=>{
            console.log(data)
            if (data.login_success){
                Toast.fire({
                icon: 'success',
                title: 'Signed in successfully'
                }).then(()=>{
                clearInputs()
                window.location= `/home`
                }
                )
            }
           else
            {
                Toast.fire({
                icon: 'error',
                title: 'Sign in failed'
                })
                clearInputs()
            }
        })
        )
        return true;
    }

    let clearInputs=()=>{
    inputs.forEach(input=>input.value="")
    inputs[0].focus()
    }

    const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
    })
</script>
@endpush