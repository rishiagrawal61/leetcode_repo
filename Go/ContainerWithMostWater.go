func maxArea(height []int) int {
    left, right := 0, len(height)-1
    maxWater := 0

    for left < right {
        // Find width and height
        width := right - left
        h := 0
        if height[left] < height[right] {
            h = height[left]
        } else {
            h = height[right]
        }

        // Calculate area
        area := width * h
        if area > maxWater {
            maxWater = area
        }

        // Move the pointer with smaller height
        if height[left] < height[right] {
            left++
        } else {
            right--
        }
    }

    return maxWater
}
