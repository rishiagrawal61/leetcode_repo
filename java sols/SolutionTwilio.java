import java.io.*;
import java.math.*;
import java.security.*;
import java.text.*;
import java.util.*;
import java.util.concurrent.*;
import java.util.regex.*;



class Result {

    /*
     * Complete the 'calculateTotalMessageCost' function below.
     *
     * The function is expected to return a DOUBLE.
     * The function accepts STRING_ARRAY messages as parameter.
     */

    public static double calculateTotalMessageCost(List<String> messages) {
        Map <Integer, int []> typeArr = new HashMap <>();
        double cost = 0;
        for(String str : messages) {
            typeArr = getMessageType(str);
            for(Map.Entry<Integer, int []> arr : typeArr.entrySet()){
                if(arr.getKey() == 1) {
                    int length = str.length();
                    cost+= Math.ceil(length/160)*0.01;
                } else {
                    if(str.length() <= 70) {
                        cost+=0.015;
                    } else {
                        cost+=getMessagePartitionUCS2(str, arr.getValue(), 0, 0, 0);
                    }
                }
            }
        }
        return cost;
    }
    
    public static double getMessagePartitionUCS2(String message, int [] posArr, double cost, int initialIndex, int index) {
        for(int i = index;i<posArr.length;i++) {
            if(posArr[i]-initialIndex <= 70) {
                cost+=0.015;
                initialIndex = (posArr[i]-initialIndex)+1;
            } else {
                if(posArr[i]-initialIndex > 70 && posArr[i]-initialIndex < 160) {
                    cost+=0.01;
                    initialIndex = (posArr[i]-initialIndex)+1;
                } else {
                    cost+=getMessagePartitionUCS2(message, posArr, cost, initialIndex, i);
                    initialIndex = (posArr[i]-initialIndex)+1;
                }
            }
        }
        return cost;
    }
    
    public static Map <Integer, int []> getMessageType(String message) {
        int type = 1;
        Character gsmStr[] = {'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '.', ',', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'};
        Map <Character, Integer> mp = new HashMap<>();
        for(int i = 0;i<gsmStr.length;i++) {
            mp.put(gsmStr[i], 1);
        }
        Map <Integer, int []> mpi = new HashMap<>();
        int posArr[] = new int [message.length()];
        int j = 0;
        for(int i = 0;i<message.length();i++) {
            if(!mp.containsKey(message.charAt(i))){ 
                posArr[j] = i;
                type = 2;
                j++;
            }
        }
        mpi.put(type, posArr);
        return mpi;
    }

}

public class Solution {
    public static void main(String[] args) throws IOException {
        BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(System.in));
        BufferedWriter bufferedWriter = new BufferedWriter(new FileWriter(System.getenv("OUTPUT_PATH")));

        int messagesCount = Integer.parseInt(bufferedReader.readLine().trim());

        List<String> messages = new ArrayList<>();

        for (int i = 0; i < messagesCount; i++) {
            String messagesItem = bufferedReader.readLine();
            messages.add(messagesItem);
        }

        double result = Result.calculateTotalMessageCost(messages);

        bufferedWriter.write(String.valueOf(result));
        bufferedWriter.newLine();

        bufferedReader.close();
        bufferedWriter.close();
    }
}
