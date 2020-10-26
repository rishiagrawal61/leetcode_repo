func pacificAtlantic(heights [][]int) [][]int {
    if len(heights) == 0 || len(heights[0]) == 0 {
        return [][]int{}
    }

    m, n := len(heights), len(heights[0])

    // visited matrices for Pacific and Atlantic oceans
    pacific := make([][]bool, m)
    atlantic := make([][]bool, m)
    for i := 0; i < m; i++ {
        pacific[i] = make([]bool, n)
        atlantic[i] = make([]bool, n)
    }

    // DFS from all border cells touching the oceans
    for i := 0; i < m; i++ {
        dfs(heights, pacific, i, 0, -1)     // left edge → Pacific
        dfs(heights, atlantic, i, n-1, -1)  // right edge → Atlantic
    }
    for j := 0; j < n; j++ {
        dfs(heights, pacific, 0, j, -1)     // top edge → Pacific
        dfs(heights, atlantic, m-1, j, -1)  // bottom edge → Atlantic
    }

    // Collect intersection cells
    result := [][]int{}
    for i := 0; i < m; i++ {
        for j := 0; j < n; j++ {
            if pacific[i][j] && atlantic[i][j] {
                result = append(result, []int{i, j})
            }
        }
    }

    return result
}

// DFS to mark reachable cells
func dfs(heights [][]int, visited [][]bool, r, c, prevHeight int) {
    // Boundary or already visited check
    if r < 0 || c < 0 || r >= len(heights) || c >= len(heights[0]) || visited[r][c] {
        return
    }

    // Flow rule (reverse direction): can only go to equal or higher heights
    if heights[r][c] < prevHeight {
        return
    }

    visited[r][c] = true

    // Explore 4 directions
    dfs(heights, visited, r+1, c, heights[r][c])
    dfs(heights, visited, r-1, c, heights[r][c])
    dfs(heights, visited, r, c+1, heights[r][c])
    dfs(heights, visited, r, c-1, heights[r][c])
}
