func hammingWeight(n int) int {
    count := 0;
    for n > 0 {
        temp := n % 2;
        if(temp == 1) {
            count++
        }
        n = n/2
    }
    return count
}
