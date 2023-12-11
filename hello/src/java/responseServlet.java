import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.io.PrintWriter;

import jakarta.servlet.ServletException;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

public class responseServlet extends HttpServlet {

    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {

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

        response.setContentType("text/plain");
        PrintWriter out = response.getWriter();

        if (isValid) {
            out.println("Permit");
        } else {
            out.println("Deny");
        }
        out.close();
    }

    @Override
    public String getServletInfo() {
        return "Short description";
    }
}