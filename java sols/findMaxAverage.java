class Solution {
    public double findMaxAverage(int[] nums, int k) {
        int i = 0;
        int j = 0;
        double sum = 0;
        while(i < k-1){
            sum += nums[i];
            i++;
        }
        
        double max = Integer.MIN_VALUE;
        while( i < nums.length){
            sum += nums[i];
            
            double avg = sum / k;
            
            if(avg > max){
                max = avg;
            }
            
            i++;           
            sum -= nums[j];
            j++;
         }
        return max;
    }
}