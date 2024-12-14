# PHP Vehicle Management System

This project is a simple web-based application written in PHP that allows users to manage vehicles (cars and motorcycles). The application lets users log in, set custom styling preferences, and input vehicle data which is saved to a CSV file. It supports the registration of vehicles with specific attributes for cars and motorcycles.

## Features

- **Login System**: Users can log in using a username and password.
- **Session Management**: The system supports user sessions for personalized experiences.
- **Customizable Styles**: Users can change background color, text color, and font size, which are saved as cookies while the session is active.
- **Vehicle Registration**: Users can register cars and motorcycles with attributes such as brand, model, year, fuel type, and consumption.
- **Data Storage**: Vehicle information is saved in a CSV file for persistent storage.
- **Responsive Interface**: Simple forms are used to input data and manage sessions.

## File Structure

- `index.php`: The login page for the user to enter their credentials.
- `menu.php`: The main menu page that allows users to access different sections such as vehicle registration and styling preferences.
- `estilos.php`: The page where users can customize background color, text color, and text size.
- `introduccion.php`: The form to input vehicle data (either for cars or motorcycles).
- `obtencion.php`: Displays the vehicle information stored in the CSV file.
- `vehiculo.php`: The base class for vehicles with common attributes.
- `moto.php`: Defines the Motorcycle class that extends the Vehicle class.
- `coche.php`: Defines the Car class that extends the Vehicle class.

## Installation

1. Clone the repository to your local server or environment.
2. Ensure your PHP environment is correctly set up to run the application.
3. Place the files in a directory accessible by your PHP server.

## Configuration

- **Login Credentials**: Users can log in with a username and password stored in the `pwd.txt` file. Ensure the file is formatted correctly (username:password).
- **Session Management**: The system uses PHP sessions to store user data, so make sure your server supports session handling.
- **CSV Storage**: The system saves vehicle data in a `vehiculos.csv` file. Make sure the file is writable by the web server.

## Usage

1. **Login**: Open `index.php` and log in using your credentials.
2. **Menu**: After logging in, you will be redirected to the main menu where you can:
   - Enter vehicle data.
   - Customize your display preferences (background color, text color, font size).
   - View the vehicles registered.
3. **Input Vehicle Data**: Select whether you're adding a car or a motorcycle, and fill in the required fields.
4. **View Data**: After submitting vehicle information, it will be saved to a CSV file and can be viewed in the application.

## Styling

Users can change the background color, text color, and text size. These settings are saved as cookies, but they only persist while the session is active. Once the user logs out or the session ends, the cookies are deleted.

## Security Notes

- The login system is basic and should not be used in production environments without further security measures (e.g., password hashing, database storage).
- The system uses cookies for styling preferences, but they are deleted when the session ends or the user logs out.
