<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publisher Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
    <style>
        :root {
            /* Colors */
            --primary-light-color: #eddfff;
            --primary-color: #7b36b5;
            --primary-dark-color: #3c1a55;
            --secondary-color: #1f0031;
            --dark-color: #1c1c1c;
            --light-color: #dadada;
            --success-color: #28a745;
            --error-color: #dc3545;
            --warning-color: #ffc107;
            --info-color: #17a2b8;
            /* Font Families */
            --primary-font-family: "DM Sans", sans-serif;
            --secondary-font-family: "Arial", sans-serif;
            /* Buttons */
            --btn-primary-background-color: #7b36b5;
            --btn-primary-border-color: #7b36b5;
            --btn-primary-color: #eddfff;
            --btn-primary-outline-color: #7b36b5;
            --btn-primary-outline-border: #7b36b5;
            --btn-primary-outline-background: transparent;
        }

        body {
            font-family: var(--primary-font-family);
            background-color: var(--primary-light-color);
            margin: 0;
            /* fixed 50px margin hata diya */
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            display: flex;
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            /* full width le */
            max-width: 1200px;
            /* lekin max limit bhi set */
            margin: 20px;
            /* thoda responsive gap */
            overflow: hidden;
        }


        .sidebar {
            background-color: var(--primary-color);
            color: #fff;
            padding: 40px;
            width: 30%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .sidebar h2 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .sidebar p {
            margin-bottom: 30px;
            color: var(--primary-light-color);
        }



        .main-content {
            padding: 40px;
            width: 60%;
            display: flex;
            flex-direction: column;
        }

        .progress-bar {
            display: flex;
            justify-content: space-around;
            margin-bottom: 30px;
        }

        .progress-step {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--light-color);
            color: #fff;
            font-weight: bold;
            font-size: 1.2rem;
        }

        .progress-step.active {
            background-color: var(--primary-color);
        }

        .progress-step.completed {
            background-color: var(--success-color);
            color: #fff;
        }

        .progress-step.completed::before {
            content: "✔";
            font-size: 1.5rem;
        }

        .progress-step.completed span {
            display: none;
        }

        .form-section {
            display: none;
            flex-direction: column;
            gap: 20px;
        }

        .form-section.active {
            display: flex;
        }

        .form-title {
            font-size: 2rem;
            color: var(--secondary-color);
            margin-bottom: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.row {
            flex-direction: row;
            gap: 20px;
        }

        .form-group.row>div {
            flex: 1;
        }

        label {
            font-weight: bold;
            color: var(--dark-color);
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        textarea,
        select {
            padding: 12px;
            border: 1px solid var(--light-color);
            border-radius: 8px;
            font-size: 1rem;
            width: 100%;
            box-sizing: border-box;
            background-color: #f9f9f9;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px var(--primary-light-color);
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .checkbox-group a {
            color: var(--primary-color);
            text-decoration: none;
        }

        .form-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .form-buttons.right-align {
            justify-content: flex-end;
        }

        .btn {
            padding: 12px 25px;
            font-size: 1rem;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn-primary {
            background-color: var(--btn-primary-background-color);
            border: 1px solid var(--btn-primary-border-color);
            color: var(--btn-primary-color);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark-color);
            border-color: var(--primary-dark-color);
        }

        .btn-secondary {
            background-color: transparent;
            border: 1px solid var(--primary-color);
            color: var(--primary-color);
        }

        .btn-secondary:hover {
            background-color: var(--primary-light-color);
        }

        /* Verification Page Specifics */
        .verification-content {
            text-align: center;
            padding: 50px;
            background-color: #f9f9f9;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 20px;
        }

        .verification-content .check-icon {
            font-size: 4rem;
            color: var(--success-color);
        }

        .verification-content h3 {
            font-size: 1.5rem;
            margin: 0;
            color: var(--secondary-color);
        }

        .verification-text h2 {
            font-size: 2rem;
            color: var(--secondary-color);
        }

        .verification-text p {
            color: var(--dark-color);
            line-height: 1.5;
        }

        .phone-input {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .phone-input .country-code {
            padding: 12px;
            border: 1px solid var(--light-color);
            border-radius: 8px;
            background-color: #f9f9f9;
            width: 80px;
        }

        /* Make form responsive */


        /* Improve select dropdown spacing */
        select {
            appearance: none;
            /* removes default arrow styling */
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml;utf8,<svg fill='black' height='24' width='24' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/></svg>");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 18px;
            padding-right: 40px;
            /* spacing for arrow */
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                width: 100%;
                margin: 0;
                /* no extra side margins */
                border-radius: 0;
                /* no rounded cut at edges */
            }

            .sidebar {
                width: 95%;
                padding: 20px;
                border-radius: 0;
                text-align: center;
            }

            .main-content {
                width: 90%;
                padding: 20px;
            }

            .form-group.row {
                flex-direction: column;
                gap: 15px;
            }

            .form-buttons {
                flex-direction: column;
                gap: 15px;
            }

            .btn {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .progress-bar {
                justify-content: space-between;
                /* evenly distribute */
            }

            .progress-step {
                width: 30px;
                height: 30px;
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="sidebar">
            <div id="sidebar-step-1" class="sidebar-content active">
                <h2>Join as a Publisher</h2>
                <p>Start registering your publisher account with LinksCircle and partner with advertisers.</p>
            </div>
        </div>
        <div class="main-content">

            @yield('content')
        </div>
    </div>
</body>

</html>
<script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/jquery/jquery-3.5.1.min.js") }}"></script>
<script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/jquery.validate.min.js") }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
@yield('top_scripts')
<script>

    let currentStep = 1;

    function updateUI() {
        // Hide all sections
        document.querySelectorAll('.form-section').forEach(section => {
            section.style.display = 'none';
        });
        document.querySelectorAll('.sidebar-content').forEach(sidebar => {
            sidebar.style.display = 'none';
        });

        // Show current section
        document.getElementById(`form-step-${currentStep}`).style.display = 'flex';
        document.getElementById(`sidebar-step-${currentStep}`).style.display = 'block';

        // Update progress bar
        document.querySelectorAll('.progress-step').forEach(step => {
            const stepNumber = parseInt(step.id.split('-')[1]);
            if (stepNumber < currentStep) {
                step.classList.add('completed');
                step.classList.remove('active');
            } else if (stepNumber === currentStep) {
                step.classList.remove('completed');
                step.classList.add('active');
            } else {
                step.classList.remove('completed', 'active');
            }
        });
    }

    function nextStep(step) {
        currentStep = step;
        updateUI();
    }

    function prevStep(step) {
        currentStep = step;
        updateUI();
    }

    // Initial setup
    document.addEventListener('DOMContentLoaded', () => {
        updateUI();
    });
</script>