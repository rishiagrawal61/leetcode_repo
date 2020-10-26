import "fmt"

func isAnagram(s string, t string) bool {
    sMap := map[rune]int{}
    tMap := map[rune]int{}

    for _, char := range s {
        _, exists := sMap[char]
        if exists {
            sMap[char]++
        } else {
            sMap[char] = 1
        }
    }

    for _, char := range t {
        _, exists := tMap[char]
        if exists {
            tMap[char]++
        } else {
            tMap[char] = 1
        }
    }

    return mapsEqual(sMap, tMap)
}

func mapsEqual(a, b map[rune]int) bool {
        if len(a) != len(b) {
            return false
        }

        for k, v := range a {
            if bv, ok := b[k]; !ok || bv != v {
                return false
            }
        }
        return true
    }
