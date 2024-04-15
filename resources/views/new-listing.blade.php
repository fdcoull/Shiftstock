<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Items</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      background-color: #f8f9fa;
    }

    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 40px;
      background-color: #ffffff;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
    }

    input[type="text"],
    textarea,
    input[type="file"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ced4da;
      border-radius: 5px;
      transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    input[type="text"]:focus,
    textarea:focus,
    input[type="file"]:focus {
      border-color: #007bff;
      outline: 0;
      box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    button[type="submit"] {
      padding: 10px 20px;
      background-color: #df7e64;
      color: #415a77;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    button[type="submit"]:hover {
      background-color: #df7e64;
    }
  </style>
</head>
<body>


	<div class="container">
	  <h1 class="text-center mb-4">Add Items</h1>
	  <form id="addItemForm" action="/listings/new" method="POST">
	  @csrf
		<div class="form-group">
		  <label for="itemName">Item Name</label>
		  <input type="text" class="form-control" id="itemName" name="title" placeholder="Enter item name...">
		</div>
		
		<div class="form-group">
		  <label for="itemDescription">Description</label>
		  <textarea type="text" class="form-control" id="itemDescription" rows="3" name="description" placeholder="Enter item description..."></textarea>
		</div>
		
		<div class="form-group">
		  <label for="itemDescription">Packaging</label>
		  <input type="text" class="form-control" id="itemPackaging" name="packaging" placeholder="Enter item packaging..."></input>
		</div>
		
		<div class="form-group">
		  <label for="itemDescription">Weight</label>
		  <input type="text" class="form-control" id="itemWeight" name="weight" placeholder="Enter item weight..."></input>
		  <select name="weight_unit">
            <option value="KG">Kilogram</option>
            <option value="G">Gram</option>
            <option value="TN">Metric Tonne</option>
            <option value="OZ">Ounce</option>
            <option value="LB">Pound</option>
            <option value="ST">Stone</option>
		  </select>
		</div>
		
		<div class="form-group">
		  <label for="itemDescription">Quantity</label>
		  <input type="number" class="form-control" id="itemQuantity" name="quantity_inhand" placeholder="Enter quantity..."></input>
		</div>
		
		<div class="form-group">
		  <label for="itemDescription">Price</label>
		  <input type="number" class="form-control" id="itemPrice" name="price" placeholder="Enter price..."></input>
		  <select name="currency">
            <option value="GBP">British Pound</option>
            <option value="EUR">Euro</option>
            <option value="USD">US Dollar</option>
          </select>
		</div>
		
		<div class="form-group">
		  <label for="itemDescription">Age</label>
		  <input type="date" class="form-control" id="itemDate" name="age" placeholder="Enter age of stock..."></input>
		</div>
		
		<div class="form-group">
		  <label for="itemDescription">Expiry Date</label>
		  <input type="date" class="form-control" id="itemDate" name="expiry" placeholder="Enter expiry date of stock..."></input>
		</div>
		
		<div class="form-group">
		  <label for="itemImage">Upload Image</label>
		  <input type="file" class="form-control-file" id="itemImage">
		</div>
		
		<button type="submit" class="btn btn-primary btn-block">Add Item</button>
	  </form>
	</div>

	@auth
	{{Auth::user()->name}}
	@else
	<p>Not logged in</p>
	@endauth

	<script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
