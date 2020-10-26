<?php
/********BFS implementation********/
class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @param Integer $source
     * @param Integer $destination
     * @return Boolean
     */
    function validPath($n, $edges, $source, $destination) {
        if($n == 1 && $source == $destination)
            return true;
        if(count($edges) == 1 && $edges[0][0] == $source && $edges[0][1] == $destination)
            return true;
        $eleArr = [];
        for($i = 0;$i<count($edges);$i++) {
            if(isset($eleArr[$edges[$i][0]]))
                array_push($eleArr[$edges[$i][0]], $edges[$i][1]);
            else
                $eleArr[$edges[$i][0]] = [$edges[$i][1]];
            if(isset($eleArr[$edges[$i][1]]))
                array_push($eleArr[$edges[$i][1]], $edges[$i][0]);
            else
                $eleArr[$edges[$i][1]] = [$edges[$i][0]];
        }
        
        $visited = [];
        for($i = 0;$i<$n;$i++)
            $visited[$i] = false;
        
        $q = new SplQueue();
        $visited[$source] = true;
        $q->enqueue($source);
        while(!$q->isEmpty()) {
            $source = $q->dequeue();
            for($i = 0;$i<count($eleArr[$source]);$i++) {
                if($eleArr[$source][$i] == $destination)
                    return true;
                
                if(!$visited[$eleArr[$source][$i]]) {
                    $visited[$eleArr[$source][$i]] = true;
                    $q->enqueue($eleArr[$source][$i]);
                }
            }
        }
        return false;
    }
}
?>

<?php
/********Floyd Warshals Implementation*********/
class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @param Integer $source
     * @param Integer $destination
     * @return Boolean
     */
    function validPath($n, $edges, $source, $destination) {
        $eleArr = [];
        if($n == 1 && $source == $destination)
            return true;
        if(count($edges) == 1 && $edges[0][0] == $source && $edges[0][1] == $destination)
            return true;
        for($i = 0;$i<count($edges);$i++) {
            if(isset($eleArr[$edges[$i][0]]))
                array_push($eleArr[$edges[$i][0]], $edges[$i][1]);
            else
                $eleArr[$edges[$i][0]] = [$edges[$i][1]];
            if(isset($eleArr[$edges[$i][1]]))
                array_push($eleArr[$edges[$i][1]], $edges[$i][0]);
            else
                $eleArr[$edges[$i][1]] = [$edges[$i][0]];
        }
        $path = false;$traversed = [];
        $this->getPathCheck($eleArr, $source, $destination, $path, $traversed);
        return $path;
    }
    
    function getPathCheck ($eleArr, $source, $destination, &$path, $traversed) {
        if(!isset($eleArr[$source]) || in_array($source, $traversed)) {
            $path = false;
            return $path;
        }
        array_push($traversed, $source);
        for($i = 0;$i<count($eleArr[$source]);$i++) {
            if(isset($eleArr[$eleArr[$source][$i]])) {
                $path = true;
                if($eleArr[$source][$i] == $destination)
                    return $path;
                $path = $this->getPathCheck($eleArr, $eleArr[$source][$i], $destination, $path, $traversed);
                if($path == true)
                    return $path;
                if($i != (count($eleArr[$source])-1))
                    continue;
                else
                    return $path;
            } else {
                if($path == true && $eleArr[$source][$i] == $destination)
                    return $path;
                if($i != (count($eleArr[$source])-1))
                    continue;
                else
                    $path = false;
                return $path;
            }
        }
    }
}
?>