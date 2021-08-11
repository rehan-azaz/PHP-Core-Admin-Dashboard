<?php
$con=mysqli_connect('localhost','root','','shopify')
or die("connection failed".mysqli_errno());

$request=$_REQUEST;

$col =array(
    0  =>  'id',
    1  =>  'name',
    2  =>  'image',
    3  =>  'description',
);

$sql ="SELECT * FROM Category";
$query=mysqli_query($con,$sql);
$totalData=mysqli_num_rows($query);

$totalFilter=$totalData;

$sql ="SELECT * FROM Category WHERE 1=1";
if(!empty($request['search']['value'])){
    $sql.=" AND (id Like '".$request['search']['value']."%' ";
    $sql.=" OR name Like '".$request['search']['value']."%' ";
    $sql.=" OR description Like '".$request['search']['value']."%' ";
  }

$query=mysqli_query($con,$sql);
$totalData=mysqli_num_rows($query);

$sql.=" ORDER BY ".$col[$request['order'][0]['column']]."   ".$request['order'][0]['dir']."  LIMIT ".
    $request['start']."  ,".$request['length']."  ";

$query=mysqli_query($con,$sql);

$data=array();

while($row=mysqli_fetch_array($query)){
        $subdata=array();
        $subdata[]=$row[0];
        $subdata[]=$row[1];
        $subdata[]='<img src="'.$row[2].'" width="50px" height="50px">';
        $subdata[]=$row[3];
        $subdata[]='<button type="button" id="btn-edit-category" class="btn btn-primary btn-xs" style="min-width:92px" data-toggle="modal" data-target="#category-action-modal" data-id="'.$row[0].'"><i class="mdi mdi-pencil">&nbsp;</i>Edit</button>
                <button type="button" id="btn-delete-category" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#category-action-modal" data-id="'.$row[0].'"><i class="mdi mdi-delete">&nbsp;</i>Delete</button>';
        $data[]=$subdata;
}

$json_data=array(
    "draw"              =>  intval($request['draw']),
    "recordsTotal"      =>  intval($totalData),
    "recordsFiltered"   =>  intval($totalFilter),
    "data"              =>  $data
);

echo json_encode($json_data);

?>