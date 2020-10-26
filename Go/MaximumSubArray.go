func maxSubArray(nums []int) int {
    maxSoFar := nums[0]
    currSum := nums[0]

    for i := 1; i < len(nums); i++ {
        if currSum < 0 {
            currSum = nums[i]
        } else {
            currSum += nums[i]
        }

        if currSum > maxSoFar {
            maxSoFar = currSum
        }
    }

    return maxSoFar
}
