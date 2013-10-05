package org.hack4good.streemufi.upload;

public class MockVideoUploadService implements VideoUploadService {

    /**
     * @return the URL for the Video
     */
    public String uploadVideo() {
        return "http://www.youtube.com/watch?v=Us-TVg40ExM";
    }
}
