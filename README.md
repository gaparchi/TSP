# TSP
by Sergey Yakimov

package tsp;
 
 ```java
class Tsp {
 
    private int[][] permutations;
 
    int[] tsp(int[][] graph) {
        if (permutations == null) permutations(graph.length);
 
        int[] bestPath = permutations[0];
        int bestCost = 0;
        for (int i : bestPath) bestCost += i;
 
        for (int[] permutation : permutations) {
            int cost = 0;
            for (int i : permutation) cost += i;
 
            if (cost < bestCost) {
                bestPath = permutation;
                bestCost = cost;
            }
        }
 
        return bestPath;
    }
 
    private void permutations(int graphLength) {
        int permutationsCount = 1;
        for (int i = 2; i <= graphLength; i++) permutationsCount *= i;
        permutations = new int[permutationsCount][];
 
        int[] a = new int[graphLength];
        int[] p = new int[graphLength + 1];
 
        for (int i = 0; i < a.length; i++) a[i] = i;
        for (int i = 0; i < p.length; i++) p[i] = i;
 
        permutations[0] = a.clone();
        permutationsCount = 1;
 
        int i = 1;
        while (i < graphLength) {
            p[i]--;
 
            int j = i % 2 * p[i];
            int tmp = a[j];
            a[j] = a[i];
            a[i] = tmp;
 
            i = 1;
            while (p[i] == 0) p[i] = i++;
 
            permutations[permutationsCount++] = a.clone();
        }
    }
 }
```
