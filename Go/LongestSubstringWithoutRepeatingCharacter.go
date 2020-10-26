import "slices"

func lengthOfLongestSubstring(s string) int {
    mySlice := []rune{}
    maxCounter := 0
    for _,char := range s {
        if pos := slices.Index(mySlice, char); pos != -1 {
            // cut the window from after duplicate
            mySlice = mySlice[pos+1:]
        }
        // append current char
        mySlice = append(mySlice, char)

        // update max length
        if len(mySlice) > maxCounter {
            maxCounter = len(mySlice)
        }
    }

    return maxCounter
}
