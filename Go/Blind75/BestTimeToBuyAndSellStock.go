func maxProfit(prices []int) int {
    if len(prices) < 2 {
		return 0
	}

	minPrice := prices[0]
	maxProfit := 0

	for i := 1; i < len(prices); i++ {
		// If selling today gives better profit, update maxProfit
		if prices[i]-minPrice > maxProfit {
			maxProfit = prices[i] - minPrice
		}
		// Update minPrice if today's price is lower
		if prices[i] < minPrice {
			minPrice = prices[i]
		}
	}

	return maxProfit
}
