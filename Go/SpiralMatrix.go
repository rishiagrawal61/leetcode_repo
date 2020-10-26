import "fmt"

func spiralOrder(matrix [][]int) []int {
        if len(matrix) == 0 {
        return []int{}
    }

    n := len(matrix)
    m := len(matrix[0])
    res := []int{}

    top, bottom := 0, n-1
    left, right := 0, m-1

    for top <= bottom && left <= right {
        // Traverse from left → right
        for j := left; j <= right; j++ {
            res = append(res, matrix[top][j])
        }
        top++

        // Traverse from top → bottom
        for i := top; i <= bottom; i++ {
            res = append(res, matrix[i][right])
        }
        right--

        // Traverse from right → left (if still valid)
        if top <= bottom {
            for j := right; j >= left; j-- {
                res = append(res, matrix[bottom][j])
            }
            bottom--
        }

        // Traverse from bottom → top (if still valid)
        if left <= right {
            for i := bottom; i >= top; i-- {
                res = append(res, matrix[i][left])
            }
            left++
        }
    }

    return res
}
