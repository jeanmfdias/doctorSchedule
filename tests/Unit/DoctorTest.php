<?php

namespace Tests\Unit;

use App\Repositories\Repository;
use App\Doctor;
use App\User;
use PhpParser\Comment\Doc;
use Ramsey\Uuid\Exception\DceSecurityException;
use Tests\TestCase;

class DoctorTest extends TestCase
{
    /**
     * @return void
     */
    public function testAll()
    {
        factory(Doctor::class)->create();
        $doctorRepo = new Repository(new Doctor());

        $result = $doctorRepo->all();

        $this->assertNotEmpty($result);
    }

    public function testPreview()
    {
        $dataExpect = factory(Doctor::class)->create();

        $doctorRepo = new Repository(new Doctor());
        $result = $doctorRepo->preview($dataExpect->id);
        $this->assertTrue($result->name == $dataExpect->name);
    }

    public function testStore()
    {
        $user = factory(User::class)->create();

        $dataExpect = [
            'name' => 'Dr. Test',
            'crm' => '123456',
            'status' => 1,
            'register_by_user_id' => $user->id
        ];

        $doctorRepo = new Repository(new Doctor());
        $result = $doctorRepo->create($dataExpect);
        $this->assertEquals('Dr. Test', $result->name);
    }

    public function testUpdate()
    {
        $doctor = factory(Doctor::class)->create();

        $dataExpect = [
            'crm' => '232323'
        ];

        $doctorRepo = new Repository(new Doctor());
        $result = $doctorRepo->update($dataExpect, $doctor->id);
        $doctor->refresh();
        $this->assertTrue($result);
        $this->assertEquals($dataExpect['crm'], $doctor->crm);
    }

    public function testDestroy()
    {
        $doctor = factory(Doctor::class)->create();

        $doctorRepo = new Repository(new Doctor());
        $result = $doctorRepo->delete($doctor->id);
        $this->assertTrue($result);
    }
}
