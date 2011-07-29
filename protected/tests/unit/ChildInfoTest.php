<?php
class ChildInfoTest extends CDbTestCase{
    public function testCRUD(){
        //CREATE a new child_info
        $newChildInfo = new ChildInfo;
        $newChildName = 'L MANO';
        $newChildInfo->setAttributes(
            array(
                'child_id' => '1601002110000',
                'school_id' => '16010021',
                'class_id' => 1,
                'admin_no' => '00000',
                'sex_id' => '1',
                'child_name' => $newChildName,
                'child_status' => 1,
            )
        );
        $this->assertTrue($newChildInfo->save(false));

        //READ back the newly created child_info
        $retrievedChildInfo = ChildInfo::model()->findByPk($newChildInfo->id);
        $this->assertTrue($retrievedChildInfo instanceof ChildInfo);
        $this->assertEquals($newChildName, $retrievedChildInfo->child_name);

        //UPDATE the newly created child_info
        $updatedChildName = 'L MANO new name';
        $newChildInfo->child_name = $updatedChildName;
        $this->assertTrue($newChildInfo->save(false));

        //read back the record to ensure update worked
        $updatedChildInfo = ChildInfo::model()->findByPk($newChildInfo->id);
        $this->assertTrue($updatedChildInfo instanceof ChildInfo);
        $this->assertEquals($updatedChildName, $updatedChildInfo->child_name);

        //DELETE the child_info
        $newChildInfoId = $newChildInfo->id;
        $this->assertTrue($newChildInfo->delete());
        $deletedChildInfo = ChildInfo::model()->findByPk($newChildInfoId);
        $this->assertEquals(NULL, $deletedChildInfo);
    }
}
