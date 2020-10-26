func containsDuplicate(nums []int) bool {
    myMap := map[int]int{}

    for i:=0;i<len(nums);i++ {
        _, exists := myMap[nums[i]]
        if exists {
            return true
        } else {
            myMap[nums[i]] = 1
        }
    }

    return false
}
