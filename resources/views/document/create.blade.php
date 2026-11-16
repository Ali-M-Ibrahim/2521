<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Form with File Upload</title>
   <style>
       /* Reset and base font */
       * {
           box-sizing: border-box;
           margin: 0;
           padding: 0;
           font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
       }

       /* Center the form on the page */
       body {
           background-color: #f4f7f6;
           display: flex;
           justify-content: center;
           align-items: center;
           min-height: 100vh;
           padding: 20px;
       }

       /* Form card container */
       .form-container {
           background-color: #ffffff;
           padding: 32px;
           border-radius: 10px;
           box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
           width: 100%;
           max-width: 420px;
       }

       .form-container h2 {
           margin-bottom: 24px;
           color: #222222;
           font-size: 1.5rem;
           text-align: center;
       }

       /* Form field spacing */
       .form-group {
           margin-bottom: 18px;
       }

       .form-group label {
           display: block;
           margin-bottom: 6px;
           font-weight: 600;
           color: #444444;
           font-size: 0.9rem;
       }

       /* Standard text and email inputs */
       .form-group input[type="text"],
       .form-group input[type="email"] {
           width: 100%;
           padding: 10px 12px;
           border: 1px solid #cccccc;
           border-radius: 6px;
           font-size: 1rem;
           transition: border-color 0.2s;
       }

       .form-group input[type="text"]:focus,
       .form-group input[type="email"]:focus {
           outline: none;
           border-color: #0066cc;
       }

       /* File upload box styling */
       .form-group input[type="file"] {
           width: 100%;
           padding: 8px;
           border: 1px dashed #bbbbbb;
           border-radius: 6px;
           background-color: #fafafa;
           font-size: 0.9rem;
           color: #555555;
           cursor: pointer;
       }

       /* Customizing the "Choose File" button inside the file input */
       .form-group input[type="file"]::file-selector-button {
           background-color: #e9ecef;
           color: #333333;
           border: none;
           padding: 8px 14px;
           border-radius: 4px;
           margin-right: 12px;
           font-weight: 600;
           cursor: pointer;
           transition: background-color 0.2s;
       }

       .form-group input[type="file"]::file-selector-button:hover {
           background-color: #dde2e6;
       }

       /* Submit button */
       button[type="submit"] {
           width: 100%;
           padding: 12px;
           background-color: #0066cc;
           color: #ffffff;
           border: none;
           border-radius: 6px;
           font-size: 1rem;
           font-weight: 600;
           cursor: pointer;
           margin-top: 8px;
           transition: background-color 0.2s;
       }

       button[type="submit"]:hover {
           background-color: #0052a3;
       }

   </style>
</head>
<body>
<div class="form-container">
    <h2>Submit Your Details</h2>
    <form action="{{route('store-document')}}" method="POST" enctype="multipart/form-data" >
        @csrf
        <div class="form-group">
            <label for="file-upload">Attach File</label>
            <input type="file" id="file-upload" name="document"  >
        </div>
        @error('document')
        <span>{{$message}}</span>
        @enderror
        <button type="submit">Submit Form</button>
    </form>
</div>
</body>
</html>
