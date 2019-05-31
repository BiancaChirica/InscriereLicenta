package Algoritmi;

/**
 * This class is the stopwatch of the Back class
 * It creates a thread that sleeps a given amount of time
 * After the time passes, it calls the method setRunning(false)
 * that closes the backtracking algorithm
 */
public class Cronometru implements Runnable {
    private Back back;
    private long maxRunningTime;

    /**
     * This constructor sets an instance of the Back class
     * And the running amount of time
     *
     * @param back the object of the Back class
     * @param maxRunningTime the running amount of time
     */
    public Cronometru(Back back, long maxRunningTime){
        this.back = back;
        this.maxRunningTime = maxRunningTime;
    }

    /**
     * This method puts a thread to sleep a given amount of time
     * When the time passes, it calls the method setRunning that terminates the backtracking algorithm
     * @throws InterruptedException if the sleep function is interrupted
     */
    void timekeeping() throws InterruptedException {
        Thread.sleep(maxRunningTime);
        back.setRunning(false);
        System.out.println("Program Terminated");
    }

    /**
     * The run method that is handling the thread
     * It calls the timekeeping() method
     */
    @Override
    public void run() {
        try {
            timekeeping();
        } catch (Exception e) {
            System.out.println(e);
        }
    }
}