<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Management</title>
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
    button:hover {
      opacity: 0.9;
    }
    .add-user-page, .edit-user-page {
      display: none;
    }
    input[type="text"], input[type="email"], input[type="tel"], input[type="file"] {
      width: 80%;
      padding: 10px;
      margin-bottom: 10px;
    }
    .form-actions {
      display: flex;
      justify-content: flex-end;
    }
    .user-profile {
      display: flex;
      align-items: center;
    }
    .user-profile img {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      margin-right: 10px;
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

    <!-- Add User Page -->
    <div class="add-user-page">
      <h2>Add New User</h2>
      <input type="text" id="newUserName" placeholder="Enter User Name">
      <input type="email" id="newUserEmail" placeholder="Enter User Email">
      <input type="tel" id="newUserPhone" placeholder="Enter User Phone">
      <input type="text" id="newUserAddress" placeholder="Enter User Address">
      <input type="file" id="newUserImage" accept="image/*">
      <div class="form-actions">
        <button id="saveUserBtn">Save</button>
        <button id="cancelAddBtn">Cancel</button>
      </div>
    </div>

    <!-- Edit User Page -->
    <div class="edit-user-page">
      <h2>Edit User</h2>
      <input type="text" id="editUserName" placeholder="Edit User Name">
      <input type="email" id="editUserEmail" placeholder="Edit User Email">
      <input type="tel" id="editUserPhone" placeholder="Edit User Phone">
      <input type="text" id="editUserAddress" placeholder="Edit User Address">
      <input type="file" id="editUserImage" accept="image/*">
      <div class="form-actions">
        <button id="updateUserBtn">Update</button>
        <button id="cancelEditBtn">Cancel</button>
      </div>
    </div>
  </div>

  <script>
    // Initial users list with profiles
    let users = [
      { name: 'John Doe', email: 'john@example.com', phone: '123-456-7890', address: '123 Main St', image: '' },
      { name: 'Jane Smith', email: 'jane@example.com', phone: '987-654-3210', address: '456 Oak St', image: '' },
    ];
    let editingUserIndex = null;

    const userListElement = document.getElementById('userList');
    const addUserBtn = document.getElementById('addUserBtn');
    const saveUserBtn = document.getElementById('saveUserBtn');
    const updateUserBtn = document.getElementById('updateUserBtn');
    const cancelAddBtn = document.getElementById('cancelAddBtn');
    const cancelEditBtn = document.getElementById('cancelEditBtn');

    const userPage = document.querySelector('.user-page');
    const addUserPage = document.querySelector('.add-user-page');
    const editUserPage = document.querySelector('.edit-user-page');

    const newUserNameInput = document.getElementById('newUserName');
    const newUserEmailInput = document.getElementById('newUserEmail');
    const newUserPhoneInput = document.getElementById('newUserPhone');
    const newUserAddressInput = document.getElementById('newUserAddress');
    const newUserImageInput = document.getElementById('newUserImage');

    const editUserNameInput = document.getElementById('editUserName');
    const editUserEmailInput = document.getElementById('editUserEmail');
    const editUserPhoneInput = document.getElementById('editUserPhone');
    const editUserAddressInput = document.getElementById('editUserAddress');
    const editUserImageInput = document.getElementById('editUserImage');

    const searchUserInput = document.getElementById('searchUser');

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
          </div>
        `;
        userListElement.appendChild(userItem);
      });
    }

    // Add user
    function addUser() {
      const newUserName = newUserNameInput.value.trim();
      const newUserEmail = newUserEmailInput.value.trim();
      const newUserPhone = newUserPhoneInput.value.trim();
      const newUserAddress = newUserAddressInput.value.trim();
      const newUserImage = newUserImageInput.files[0] ? URL.createObjectURL(newUserImageInput.files[0]) : '';

      if (newUserName && newUserEmail && newUserPhone && newUserAddress) {
        users.push({
          name: newUserName,
          email: newUserEmail,
          phone: newUserPhone,
          address: newUserAddress,
          image: newUserImage
        });
        newUserNameInput.value = '';
        newUserEmailInput.value = '';
        newUserPhoneInput.value = '';
        newUserAddressInput.value = '';
        newUserImageInput.value = '';
        showUserPage();
        renderUsers();
      }
    }

    // Edit user
    function editUser(index) {
      editingUserIndex = index;
      const user = users[index];
      editUserNameInput.value = user.name;
      editUserEmailInput.value = user.email;
      editUserPhoneInput.value = user.phone;
      editUserAddressInput.value = user.address;
      showEditUserPage();
    }

    // Update user
    function updateUser() {
      const updatedUserName = editUserNameInput.value.trim();
      const updatedUserEmail = editUserEmailInput.value.trim();
      const updatedUserPhone = editUserPhoneInput.value.trim();
      const updatedUserAddress = editUserAddressInput.value.trim();
      const updatedUserImage = editUserImageInput.files[0] ? URL.createObjectURL(editUserImageInput.files[0]) : users[editingUserIndex].image;

      if (updatedUserName && updatedUserEmail && updatedUserPhone && updatedUserAddress && editingUserIndex !== null) {
        users[editingUserIndex] = {
          name: updatedUserName,
          email: updatedUserEmail,
          phone: updatedUserPhone,
          address: updatedUserAddress,
          image: updatedUserImage
        };
        editingUserIndex = null;
        showUserPage();
        renderUsers();
      }
    }

    // Delete user
    function deleteUser(index) {
      users.splice(index, 1);
      renderUsers();
    }

    // Search users
    function searchUsers() {
      const searchValue = searchUserInput.value.toLowerCase();
      const filteredUsers = users.filter(user => user.name.toLowerCase().includes(searchValue));
      renderUsers(filteredUsers);
    }

    // Show User List page
    function showUserPage() {
      userPage.style.display = 'block';
      addUserPage.style.display = 'none';
      editUserPage.style.display = 'none';
    }

    // Show Add User page
    function showAddUserPage() {
      userPage.style.display = 'none';
      addUserPage.style.display = 'block';
      editUserPage.style.display = 'none';
    }

    // Show Edit User page
    function showEditUserPage() {
      userPage.style.display = 'none';
      addUserPage.style.display = 'none';
      editUserPage.style.display = 'block';
    }

    // Initial render
    renderUsers();

    // Event Listeners
    addUserBtn.addEventListener('click', showAddUserPage);
    saveUserBtn.addEventListener('click', addUser);
    updateUserBtn.addEventListener('click', updateUser);
    cancelAddBtn.addEventListener('click', showUserPage);
    cancelEditBtn.addEventListener('click', showUserPage);
    searchUserInput.addEventListener('input', searchUsers);
  </script>
</body>
</html>
