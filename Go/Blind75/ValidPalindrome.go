import ("fmt"
    "unicode")
func isPalindrome(s string) bool {
    var letters []rune
    for _, r := range s {
        if unicode.IsLetter(r) || unicode.IsDigit(r) {
            letters = append(letters, unicode.ToLower(r))
        }
    }
    if len(letters) == 0 {
        return true
    }
    return checkIfPalindrom(letters, 0, len(letters)-1)
}

func checkIfPalindrom(letters []rune, i int, j int) bool {
    if i >= j {
        return true
    }
    if letters[i] != letters[j] {
        return false
    }
    return checkIfPalindrom(letters, i+1, j-1)
}

