func isValid(s string) bool {
    stackSlice := []rune{};
    charMap := map[rune]rune{'(':')','{':'}','[':']'}

    for _,value := range s {
        if _, ok := charMap[value]; ok {
            stackSlice = append(stackSlice, value)
        } else {
            if len(stackSlice) == 0 || charMap[stackSlice[len(stackSlice)-1]] != value {
				return false
			}
            stackSlice = stackSlice[:len(stackSlice)-1]
        }
    }

    return len(stackSlice) == 0;
}
