<?php

class EscortPhoto extends Eloquent{
	protected $table = 'escorts_photos';

	public function originalUrl(){return ($this->in_aws == 'Si') ? Media::url('photos/' . $this->filename) : asset('uploads/' . $this->filename);}
	public function largeUrl(){
		return ($this->in_aws == 'Si') ? str_replace('.jpeg', '_large.jpeg', $this->originalUrl()) : str_replace('uploads/', 'uploads/large/', $this->originalUrl());
	}
	public function mediumUrl(){
		return ($this->in_aws == 'Si') ? str_replace('.jpeg', '_medium.jpeg', $this->originalUrl()) : str_replace('uploads/', 'uploads/medium/', $this->originalUrl());
	}
	public function smallUrl(){
		return ($this->in_aws == 'Si') ? str_replace('.jpeg', '_small.jpeg', $this->originalUrl()) : str_replace('uploads/', 'uploads/small/', $this->originalUrl());
	}
	public function topUrl(){
		return ($this->in_aws == 'Si') ? str_replace('.jpeg', '_top.jpeg', $this->originalUrl()) : str_replace('uploads/', 'uploads/top/', $this->originalUrl());
	}
	public function thumbUrl(){
		return ($this->in_aws == 'Si') ? str_replace('.jpeg', '_thumb.jpeg', $this->originalUrl()) : str_replace('uploads/', 'uploads/thumbnail/', $this->originalUrl());
	}

	public function uploadToAws(){
		$pathLocal = 'uploads/' . $file->name;
		$pathAws = 'photos/' . $file->name;

		$files = [
			['origen' => $pathLocal, 'destino' => $pathAws],
			['origen' => str_replace('uploads/', 'uploads/large/', $pathLocal), 'destino' => str_replace('.jpeg', '_large.jpeg', $pathAws)],
			['origen' => str_replace('uploads/', 'uploads/medium/', $pathLocal), 'destino' => str_replace('.jpeg', '_medium.jpeg', $pathAws)],
			['origen' => str_replace('uploads/', 'uploads/small/', $pathLocal), 'destino' => str_replace('.jpeg', '_small.jpeg', $pathAws)],
			['origen' => str_replace('uploads/', 'uploads/top/', $pathLocal), 'destino' => str_replace('.jpeg', '_top.jpeg', $pathAws)],
			['origen' => str_replace('uploads/', 'uploads/thumbnail/', $pathLocal), 'destino' => str_replace('.jpeg', '_thumb.jpeg', $pathAws)]
		];

		foreach($files as $fileToAws):
			$pathInLocal = $fileToAws['origen'];
			$pathToAws = $fileToAws['destino'];

			if(File::exists($pathInLocal)):
				Queue::push(function($job) use ($pathInLocal, $pathToAws){
				    $s3 = AWS::get('s3');
					$bucket = 'media.chicasbuenas.cl';

					$result = $s3->putObject(array(
					    'Bucket'     => $bucket,
					    'Key'        => $pathToAws,
					    'SourceFile' => $pathInLocal
					));

				    $job->delete();
				});

				File::delete($pathInLocal);
			endif;
		endforeach;
	}
}
