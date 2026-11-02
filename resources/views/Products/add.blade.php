<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Responsive Form</title>
    <style>
        /* Modern CSS Reset & Core Variables */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --primary-color: #4f46e5;
            --primary-hover: #4338ca;
            --bg-color: #f3f4f6;
            --card-bg: #ffffff;
            --text-main: #1f2937;
            --text-muted: #4b5563;
            --border-color: #d1d5db;
            --focus-ring: rgba(79, 70, 229, 0.2);
            --transition-speed: 0.2s;
        }

        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background-color: var(--bg-color);
            color: var(--text-main);
            line-height: 1.5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 1.5rem;
        }

        /* Container Layout */
        .form-container {
            background-color: var(--card-bg);
            padding: 2rem;
            border-radius: 0.75rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            width: 100%;
            max-width: 550px;
        }

        .form-header {
            margin-bottom: 1.75rem;
        }

        .form-header h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-main);
            margin-bottom: 0.25rem;
        }

        .form-header p {
            color: var(--text-muted);
            font-size: 0.875rem;
        }

        /* Grid Form Layout */
        .modern-form {
            display: grid;
            gap: 1.25rem;
        }

        .form-group-row {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.25rem;
        }

        @media (min-width: 480px) {
            .form-group-row {
                grid-template-columns: 1fr 1fr;
            }
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.375rem;
        }

        /* Form Controls Styling */
        label {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--text-main);
        }

        input[type="text"],
        input[type="email"],
        select,
        textarea {
            width: 100%;
            padding: 0.625rem 0.875rem;
            font-size: 0.95rem;
            font-family: inherit;
            color: var(--text-main);
            background-color: #fff;
            border: 1px solid var(--border-color);
            border-radius: 0.375rem;
            outline: none;
            transition: border-color var(--transition-speed), box-shadow var(--transition-speed);
        }

        /* Focus States */
        input:focus,
        select:focus,
        textarea:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px var(--focus-ring);
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        /* Custom Checkbox Container */
        .checkbox-group {
            display: flex;
            align-items: flex-start;
            gap: 0.5rem;
            margin-top: 0.25rem;
        }

        .checkbox-group input[type="checkbox"] {
            width: 1.15rem;
            height: 1.15rem;
            accent-color: var(--primary-color);
            cursor: pointer;
            margin-top: 0.15rem;
        }

        .checkbox-group label {
            font-weight: 400;
            color: var(--text-muted);
            cursor: pointer;
            user-select: none;
        }

        /* Submit Button */
        .submit-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 0.375rem;
            padding: 0.75rem 1.25rem;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color var(--transition-speed);
            margin-top: 0.5rem;
        }

        .submit-btn:hover {
            background-color: var(--primary-hover);
        }

        .submit-btn:active {
            transform: scale(0.99);
        }
    </style>
</head>
<body>

<div class="form-container">
    <div class="form-header">
        <h2>Create a Product</h2>
        <p>Please fill out the form below to get started.</p>
    </div>

    <form class="modern-form" action="{{route('save-product')}}" method="POST">
        @csrf
        <!-- Flex Row for First & Last Name -->
        <div class="form-group">

            <div class="form-group">
                <label for="name"> Name</label>
                <input type="text" id="name" name="name" placeholder="input name" required>
            </div>
        </div>

        <!-- Textarea Field -->
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" placeholder="Tell us about your product..."></textarea>
        </div>

        <!-- Email Field -->
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" id="price" name="price" placeholder="Produt price" required>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="submit-btn">Submit </button>
    </form>
</div>

</body>
</html>
