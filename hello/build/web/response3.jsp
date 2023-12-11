<%@ page import="java.io.BufferedReader" %>
<%@ page import="java.io.FileReader" %>

<%
    // Get the entered username and password from the request
    String username = request.getParameter("username");
    String password = request.getParameter("password");

    // Define the path to your file
    String filePath = "C:/xampp-new/htdocs/netbeans/userCredentials.txt";

    // Flag to check if credentials are valid
    boolean isValid = false;

    try {
        // Open the file for reading
        BufferedReader reader = new BufferedReader(new FileReader(filePath));

        // Read each line from the file
        String line;
        while ((line = reader.readLine()) != null) {
            // Split the line into username and password
            String[] credentials = line.split(",");

            // Check if the provided username and password match
            if (username.equals(credentials[0]) && password.equals(credentials[1])) {
                isValid = true;
                break;
            }
        }

        // Close the reader
        reader.close();
    } catch (Exception e) {
        e.printStackTrace();
    }

    // Simulated authentication logic
    if (isValid) {
        out.println("Permit");
    } else {
        out.println("Deny");
    }
%>