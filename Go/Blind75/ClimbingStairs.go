func climbStairs(n int) int {
    memo := make(map[int]int)
    return fibonachi(n+1, memo)
}

func fibonachi(n int, memo map[int]int) int {
    if n <= 1 {
        return n
    }
    if val, exists := memo[n]; exists {
        return val
    }
    memo[n] = fibonachi(n-1, memo) + fibonachi(n-2, memo)
    return memo[n]
}
