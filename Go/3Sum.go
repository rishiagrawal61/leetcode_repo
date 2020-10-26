import "sort"

func threeSum(nums []int) [][]int {
    sort.Ints(nums)
    n := len(nums)

    arr := make([][]int, 0)

    for i:=0;i<=n-2;i++  {
        if i>0 && nums[i] == nums[i-1] {
            continue
        }


        left := i+1
        right := n-1

        for left < right {
            sum := nums[i] + nums[left] + nums[right]
            if sum == 0 {
                arr = append(arr, []int{nums[i], nums[left], nums[right]})
                for left < right && nums[left] == nums[left + 1] {
                    left += 1
                }
                for left < right && nums[right] == nums[right - 1] {
                    right -= 1
                }
                left += 1
                right -= 1
            } else if sum < 0 {
                left += 1
            } else {
                right -=1
            }
        }
    }
    return arr
}
