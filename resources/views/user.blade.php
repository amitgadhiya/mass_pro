<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive User Page with Animations</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }

        .user-page {
            text-align: center;
            max-width: 400px;
            width: 100%;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: auto;
            animation: fadeIn 1s ease-in-out;
        }

        .user-card {
            padding-bottom: 20px;
            animation: slideIn 1.2s ease-in-out;
        }

        .user-avatar img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            animation: avatarPop 1s ease-out;
        }

        .user-info h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
            opacity: 0;
            animation: fadeInText 1.4s ease forwards;
        }

        .user-info p {
            font-size: 16px;
            color: #555;
            margin-bottom: 5px;
            opacity: 0;
            animation: fadeInText 1.6s ease forwards;
        }

        .user-info p span {
            font-weight: 500;
            color: #333;
        }

        .btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            max-width: 200px;
            margin-top: 20px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        /* Animations */
        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        @keyframes fadeInText {
            0% { opacity: 0; transform: translateY(10px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideIn {
            0% { transform: translateY(50px); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }

        @keyframes avatarPop {
            0% { transform: scale(0.8); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }

        @media (max-width: 768px) {
            body {
                padding: 10px;
            }

            .user-avatar img {
                width: 120px;
                height: 120px;
            }

            .user-info h2 {
                font-size: 20px;
            }

            .btn {
                max-width: 100%;
            }
        }

        @media (max-width: 480px) {
            .user-avatar img {
                width: 100px;
                height: 100px;
            }

            .user-info h2 {
                font-size: 18px;
            }

            .user-info p {
                font-size: 14px;
            }

            .btn {
                font-size: 14px;
                padding: 10px 16px;
            }
        }
    </style>
</head>
<body>
    <div class="user-page">
        <div class="user-card">
            <div class="user-avatar">
                <img src="https://via.placeholder.com/150" alt="User Avatar" id="user-avatar">
            </div>
            <div class="user-info">
                <h2 id="user-name">John Doe</h2>
                <p><span>Email:</span> <span id="user-email">john@example.com</span></p>
                <p><span>Joined:</span> <span id="user-joined">2023-01-15</span></p>
            </div>
        </div>

        <!-- Button to change user information -->
        <button class="btn" onclick="updateUser()">Change User Info</button>
    </div>

    <script>
        // Array with some user data
        const users = [
            {
                name: "Jane Smith",
                email: "jane.smith@example.com",
                joined: "2022-12-20",
                avatar: "https://via.placeholder.com/150/92c952"
            },
            {
                name: "Michael Johnson",
                email: "michael.j@example.com",
                joined: "2021-05-13",
                avatar: "https://via.placeholder.com/150/771796"
            },
            {
                name: "Emily Williams",
                email: "emily.w@example.com",
                joined: "2023-02-11",
                avatar: "https://via.placeholder.com/150/24f355"
            }
        ];

        // Function to update user info dynamically
        function updateUser() {
            // Randomly pick a user from the users array
            const randomUser = users[Math.floor(Math.random() * users.length)];

            // Update HTML content with the new user data
            document.getElementById('user-name').innerText = randomUser.name;
            document.getElementById('user-email').innerText = randomUser.email;
            document.getElementById('user-joined').innerText = randomUser.joined;
            document.getElementById('user-avatar').src = randomUser.avatar;
        }
    </script>
</body>
</html>
