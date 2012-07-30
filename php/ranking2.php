<?php

include 'ranking_new.php';

?>

	<div id="rankings">
			<table id="top_rank">
				<th>Top Ranked Routes</th>
				<tr>
					<td>Route Name</td>
					<td>Route Rating</td>
				</tr>
				<tr>
					<td class="route_name"><?php echo $top[0][0]; ?></td>
					<td class="route_score"><?php echo substr($top[0][1],0,3); ?></td>
				</tr>
				<tr>
					<td class="route_name"><?php echo $top[1][0]; ?></td>
					<td class="route_score"><?php echo substr($top[1][1],0,3); ?></td>
				</tr>
				<tr>
					<td class="route_name"><?php echo $top[2][0]; ?></td>
					<td class="route_score"><?php echo substr($top[2][1],0,3); ?></td>
				</tr>
			</table>
			<table id="bottom_rank">
				<th>Bottom Ranked Routes</th>
				<tr>
					<td>Route Name</td>
					<td>Route Rating</td>
				</tr>
				<tr>
					<td class="route_name"><?php echo $bottom[0][0]; ?></td>
					<td class="route_score"><?php echo substr($bottom[0][1],0,3); ?></td>
				</tr>
				<tr>
					<td class="route_name"><?php echo $bottom[1][0]; ?></td>
					<td class="route_score"><?php echo substr($bottom[1][1],0,3); ?></td>
				</tr>
				<tr>
					<td class="route_name"><?php echo $bottom[2][0]; ?></td>
					<td class="route_score"><?php echo substr($bottom[2][1],0,3); ?></td>
				</tr>
			</table>
	</div><!-- #rankings -->
