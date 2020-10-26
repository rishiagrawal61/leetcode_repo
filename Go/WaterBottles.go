import "fmt"

func numWaterBottles(numBottles int, numExchange int) int {
    if numBottles < numExchange {
        return numBottles
    }

    var waterBottles int
    for numBottles >= numExchange {

        division := numBottles/numExchange
        remainder := numBottles%numExchange

        waterBottles+=(division * numExchange)

        numBottles = division+remainder

        if numBottles < numExchange {
            waterBottles+=numBottles
            break
        }
    }
    return waterBottles
}
