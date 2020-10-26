func combinationSum(candidates []int, target int) [][]int {
    var res [][]int
	var combination []int

	var backtrack func(start, sum int)
	backtrack = func(start, sum int) {
		// Base case: reached the target
		if sum == target {
			// Make a copy before appending (important!)
			temp := make([]int, len(combination))
			copy(temp, combination)
			res = append(res, temp)
			return
		}

		// If sum exceeds target, no need to continue
        if sum > target {
            return
        }

		// Explore all candidates from current index onward
		for i := start; i < len(candidates); i++ {
			// Choose the current number
			combination = append(combination, candidates[i])
			
			// Because we can reuse same element, call backtrack(i, ...)
			backtrack(i, sum + candidates[i])

			// Undo the choice (backtrack)
			combination = combination[:len(combination)-1]
		}
	}

	backtrack(0, 0)
	return res

}
