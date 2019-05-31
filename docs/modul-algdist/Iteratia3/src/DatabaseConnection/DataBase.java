package DatabaseConnection;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

/**
 * This class establish the connection to the DataBase
 */
public class DataBase {
    // Ceea ce este comentat sunt datele necesare conectari la BD de pe Azure

    /**
     * The URL of the DataBase
     */
    private static final String URL = "jdbc:mysql://localhost:3306/localdb"; //jdbc:mysql://localhost:53206/localdb

    /**
     * The USER of the DataBase
     */
    private static final String USER = "dba";//"azure"

    /**
     * The PASSWORD of the DataBase
     */
    private static final String PASSWORD = "sql";//"6#vWHD_$"

    /**
     * The connection of the DataBase that needs to be established
     * Initialised with null
     */
    private static Connection connection = null;

    /**
     * An empty constructor
     */
    private DataBase() { }

    /**
     * This method gets the connection of the DataBase
     * If it's not connected yet, then it's called the createConnection() method
     * @return the connection of the DataBase
     */
    public static Connection getConnection() {
        if (connection == null) {
            createConnection();
        }
        return connection;
    }

    /**
     * This method creates a connection for the DataBase using the URL, USER and the PASSWORD,
     * Using a JDBC driver
     */
    private static void createConnection() {
        try {
            Class.forName("com.mysql.cj.jdbc.Driver");
            connection = DriverManager.getConnection(URL, USER, PASSWORD);
            connection.setAutoCommit(false);
        } catch(ClassNotFoundException e) {
            System.err.print("ClassNotFoundException: " + e) ;
        } catch(SQLException e) {
            System.err.println("SQLException: " + e);
        }

    }

    /**
     * This method transfers data to the DataBase
     */
    public static void commit() {
        try {
            connection.commit();
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    /**
     * This method closes the connection of the DataBase
     */
    public static void closeConnection() {
        try {
            connection.close();
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    /**
     * This method brings the DataBase to a previous state
     */
    public static void rollback() {
        try {
            connection.rollback();
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
}
