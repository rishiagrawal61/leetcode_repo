import java.io.*;
import java.math.*;
import java.security.*;
import java.text.*;
import java.util.*;
import java.util.concurrent.*;
import java.util.regex.*;


class Result {

    /*
     * Complete the 'getHeaviestPackage' function below.
     *
     * The function is expected to return a LONG_INTEGER.
     * The function accepts INTEGER_ARRAY packageWeights as parameter.
     */

    public static long getHeaviestPackage(List<Integer> packageWeights) {
        int maxWeight = 0;
        int a = packageWeights.size()-1;int i = packageWeights.size()-1;int prev = 0;
        while(i >= 0) {
            prev = a;
            maxWeight = packageWeights.get(a);
            for(i = a-1;i>=0;i--) {
                if(maxWeight > packageWeights.get(i)) {
                    maxWeight = packageWeights.get(i);
                    a = i;
                } else
                    break;
            }
            if(prev-i > 1) {
                for(int j = prev-1;j>=a;j--) {
                    packageWeights.set(prev, packageWeights.get(prev)+packageWeights.get(j));
                }
            }
        }
        int maxWight = Integer.MIN_VALUE;
        for(int j : packageWeights) {
            if(j > maxWight)
                maxWight = j;
        }
        return maxWight;    
    }

}
public class Solution {
    public static void main(String[] args) throws IOException {
        BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(System.in));
        BufferedWriter bufferedWriter = new BufferedWriter(new FileWriter(System.getenv("OUTPUT_PATH")));

        int packageWeightsCount = Integer.parseInt(bufferedReader.readLine().trim());

        List<Integer> packageWeights = new ArrayList<>();

        for (int i = 0; i < packageWeightsCount; i++) {
            int packageWeightsItem = Integer.parseInt(bufferedReader.readLine().trim());
            packageWeights.add(packageWeightsItem);
        }

        long result = Result.getHeaviestPackage(packageWeights);

        bufferedWriter.write(String.valueOf(result));
        bufferedWriter.newLine();

        bufferedReader.close();
        bufferedWriter.close();
    }
}