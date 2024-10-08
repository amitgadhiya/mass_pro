<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Management & Billing</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background-color: #f4f4f4;
    }
    .container {
      width: 80%;
      margin: auto;
      background: white;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .header h1 {
      margin: 0;
    }
    .header input[type="text"] {
      width: 30%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ddd;
    }
    .user-list {
      max-height: 300px;
      overflow-y: auto;
      margin: 20px 0;
    }
    .user-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px;
      border-bottom: 1px solid #ddd;
    }
    .user-item:last-child {
      border-bottom: none;
    }
    .user-item img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      margin-right: 10px;
    }
    button {
      margin: 0 5px;
      padding: 5px 10px;
      border: none;
      background-color: #007bff;
      color: white;
      cursor: pointer;
      border-radius: 3px;
    }
    button.delete-btn {
      background-color: #dc3545;
    }
    button.edit-btn {
      background-color: #28a745;
    }
    button.bill-btn {
      background-color: #ffc107;
    }
    button:hover {
      opacity: 0.9;
    }
    .bill-page {
      display: none;
    }
    .bill-container {
      margin-top: 20px;
      padding: 20px;
      background: #f8f9fa;
      border: 1px solid #ddd;
      border-radius: 5px;
    }
    .bill-container h2 {
      margin: 0 0 10px 0;
      color: #007bff;
    }
    .bill-details {
      margin: 10px 0;
    }
    .bill-details span {
      display: block;
      margin-bottom: 5px;
    }
    .bill-total {
      font-weight: bold;
      margin-top: 15px;
      color: #28a745;
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Main User List Page -->
    <div class="user-page">
      <div class="header">
        <h1>User List</h1>
        <input type="text" id="searchUser" placeholder="Search Users">
        <button id="addUserBtn">Add User</button>
      </div>

      <div class="user-list" id="userList">
        <!-- User items will be injected here -->
      </div>
    </div>

    <!-- Bill Page -->
    <div class="bill-page" id="billPage">
      <div class="bill-container" id="billContainer">
        <!-- Bill details will be displayed here -->
      </div>
      <button id="backBtn">Back to User List</button>
    </div>
  </div>

  <script>
    // Initial users list with profiles
    let users = [
      { name: 'John Doe', email: 'john@example.com', phone: '123-456-7890', address: '123 Main St', image: '', totalAmount: 500 },
      { name: 'Jane Smith', email: 'jane@example.com', phone: '987-654-3210', address: '456 Oak St', image: '', totalAmount: 800 },
    ];

    const userListElement = document.getElementById('userList');
    const billPage = document.getElementById('billPage');
    const billContainer = document.getElementById('billContainer');
    const backBtn = document.getElementById('backBtn');
    const userPage = document.querySelector('.user-page');
    
    // Tax rate (10% in this example)
    const TAX_RATE = 0.1;

    // Render user list
    function renderUsers(filteredUsers = users) {
      userListElement.innerHTML = '';
      filteredUsers.forEach((user, index) => {
        const userItem = document.createElement('div');
        userItem.classList.add('user-item');
        userItem.innerHTML = `
          <div class="user-profile">
            <img src="${user.image || 'https://via.placeholder.com/50'}" alt="User Image">
            <span>${user.name}</span>
          </div>
          <div>
            <button class="edit-btn" onclick="editUser(${index})">Edit</button>
            <button class="delete-btn" onclick="deleteUser(${index})">Delete</button>
            <button class="bill-btn" onclick="generateBill(${index})">Generate Bill</button>
          </div>
        `;
        userListElement.appendChild(userItem);
      });
    }

    // Generate a bill for the user
    function generateBill(index) {
      const user = users[index];
      const taxAmount = user.totalAmount * TAX_RATE;
      const totalWithTax = user.totalAmount + taxAmount;

      billContainer.innerHTML = `
        <h2>Bill for ${user.name}</h2>
        <div class="bill-details">
          <span>Email: ${user.email}</span>
          <span>Phone: ${user.phone}</span>
          <span>Address: ${user.address}</span>
          <span>Amount: $${user.totalAmount.toFixed(2)}</span>
          <span>Tax (10%): $${taxAmount.toFixed(2)}</span>
          <span class="bill-total">Total Amount: $${totalWithTax.toFixed(2)}</span>
        </div>
      `;

      showBillPage();
    }

    // Show Bill Page
    function showBillPage() {
      userPage.style.display = 'none';
      billPage.style.display = 'block';
    }

    // Show User List Page
    function showUserPage() {
      userPage.style.display = 'block';
      billPage.style.display = 'none';
    }

    // Go back to user list from bill page
    backBtn.addEventListener('click', showUserPage);

    // Initial render
    renderUsers();
  </script>
</body>
</html>
