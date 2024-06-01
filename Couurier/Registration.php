<!DOCTYPE html>
<html>
  <head>
    <title>Customer Order Details </title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style>
      html, body {
          min-height: 100%;
          background-image: url("backgroun3.jpg");
          background-size: cover;
          background-repeat: no-repeat;
          background-position: center center;
          margin: 0;
      }
      body, div, form, input, label {
          padding: 0;
          margin: 0;
          outline: none;
          font-family: Roboto, Arial, sans-serif;
          font-size: 16px;
          color:#000000;
          line-height: 22px;
      
      }
      h1 {
          position: absolute;
          margin: 0;
          line-height: 50px;
          font-size: 50px;
          color: #fff;
          z-index: 2;
      }
      .testbox {
          display: flex;
          justify-content: center;
          align-items: center;
          height: inherit;
          padding: 20px;
          background: transparent
      }
      form {
          width: 70%;
          padding: 20px;
          border-radius: 6px;
          backdrop-filter: blur(85px);
          background-size: cover;
          background-repeat: no-repeat;
          background-position: center center;
          background-blend-mode: multiply;
          
      }
      .banner {
          position: relative;
          height: 320px;
          color: #000000;
          background-size: cover;
          display: flex;
          justify-content: center;
          align-items: center;
          text-align: center;
          
      }
      .banner::after {
          content: "";
          background-image: url("backgroun2.jpg");
          position: absolute;
          width: 100%;
          height: 100%;
      
      }

      .search-container {
            display: flex;
            justify-content: flex-end;
            padding: 10px 0;
        }
        
        .searchTerm {
            width: 300px;
            border-radius: 15px;
            padding: 5px;
            margin-right: 10px;
        }
        
        .searchButton {
            width: 50px;
            padding: 5px;
            border: none;
            background: #f72d7a
            border-radius: 0 15px 15px 0;
            cursor: pointer;
        }
        
        .searchButton i {
            color: #fff;
        }
      input {
          margin-bottom: 10px;
          border: 1px solid #f595ba;
          border-radius: 3px;
      }
      input {
          width: calc(100% - 10px);
          padding: 5px;
      }
      input[type="date"] {
          padding: 4px 5px;
      }
      .item:hover p, .item:hover i, .question:hover p, .question label:hover, input:hover::placeholder {
          color:#080808;
      }
      .item input:hover {
          border: 1px solid transparent;
          box-shadow: 0 0 6px 0 #bd2861;
          color:;
      }
      .item {
          position: relative;
          margin: 10px 0;
      }
      .item span {
          color: red;
      }
      input[type="date"]::-webkit-inner-spin-button {
          display: none;
      }
      .item i, input[type="date"]::-webkit-calendar-picker-indicator {
          position: absolute;
          font-size: 20px;
      }
      .item i {
          right: 2%;
          top: 30px;
          z-index: 1;
      }
      [type="date"]::-webkit-calendar-picker-indicator {
          right: 1%;
          z-index: 2;
          opacity: 0;
          cursor: pointer;
      }
      .question span {
          margin-left: 30px;
      }
      .btn-block {
          margin-top: 10px;
          text-align: center;
      }
      button {
          width: 150px;
          padding: 10px;
          border: none;
          border-radius: 5px;
          background:#f72d7a;
          font-size: 16px;
          color: #fff;
          cursor: pointer;
      }
      button:hover {
          background: #ff0363;
      }
      @media (min-width: 568px) {
      .name-item, .city-item {
          display: flex;
          flex-wrap: wrap;
          justify-content: space-between;
      }
      .name-item input, .city-item input,.name-item div {
          width: calc(50% - 20px);
      }
      .name-item div input {
          width:97%;}
      .name-item div label {
          display:block;
          padding-bottom:5px;
      }
      }
    </style>
  </head>
  <body>

  <form action="search.php"  method="post">
    <div class="testbox">
    <div class="search-container">
      <input type="text" name='search_mobile' class="searchTerm" placeholder="Search" style="width:300px; border-radius:15px">
      <button type="submit" class="searchButton" value="Search" style="width:50px">
        <i class="fa fa-search"></i>
     </button>
     </div>
    </form>

      <form action="formPost.php"  method="post">
        <div class="banner">
          <h1>Customer Registration Details</h1>
          
    </div> 

    
    </br>

    

    <div class="item">
          <div class="name-item">
            <div>
              <label for="fname">Fiirst Name</label>
              <input id="fname" type="text" name="fname" required/>
            </div>
            <div>
              <label for="lname">Email</label>
              <input id="email" type="email" name="email"  required/>
            </div>
          </div>
        </div>
        
        <div class="item">
          <div class="name-item">
            <div>
              <label for="number">Mobile Number</label>
              <input id="number" type="tel" name="number"  required/>
            </div>
            <div>
              <label for="ref">Reference Number</label>
              <input id="ref" type="number" name="ref"  required/>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="name-item">
            <div>
              <label for="address">Sender's Address</label>
              <input id="address" type="text" name="send_address"  required/>
            </div>
            <div>
              <label for="address">Receiver's Address</label>
              <input id="address" type="text" name="rec_address"  required/>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="name-item">
            <div>
              <label for="status">Delivery Status</label>
              <input id="status" type="text" name="status"  required/>
            </div>
            <div>
              <label for="items">Items</label>
              <input id="items" type="text" name="items"  required/>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="name-item">
            <div>
              <label for="nic">NIC Number</label>
              <input id="nic" type="text" name="nic"  required/>
            </div>
            <div>
              <label for="amount">Amount</label>
              <input id="amount" type="number" name="amount"  required/>
            </div>
          </div>
        </div>
        <div class="item">
          <label for="description">Parcel Description</label>
          <input  id="description" type="text" name="descrip" required/>
        </div>
        
        <div class="btn-block">

          <button type="submit" value="submit">Register</button>


          <!-- <button type="submit" href="/">Delete</button> -->
        </div>
      </form>
    </div>
  </body>
</html>